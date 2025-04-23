<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    public function sessionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return response(['message' => 'The provided credentials are incorrect.'], 401);
        }

      
       

        if (!Hash::check($request->password, $user->password)) {
            return response(['message' => 'The provided credentials are incorrect.'], 401);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return response()->json(['message' => 'Logged in successfully.'], 200);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            return response(['message' => 'The provided credentials are incorrect.'], 401);
        }



        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        $request->session()->invalidate();

        // regenerate CSRF token
        $request->session()->regenerateToken();
    }
    public function register(Request $request)
{
    $data = $request->validate([
        'name'     => 'required',
        'email'    => 'required',
        'password' => 'required',
    ]);

    // Hash password before save
    $data['password'] = Hash::make($data['password']);

    $user = User::create($data);   // ← $data is still an array; works fine

    // e.g. Sanctum token (optional)
    // $token = $user->createToken('api')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully',
        // 'token'   => $token
    ], 201);
}

}
