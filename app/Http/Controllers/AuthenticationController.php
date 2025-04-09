<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
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


        if (!$user->enabled) {
            return response()->json([
                'message' => "Your account has not been approved. Please wait for approval."
            ], 401);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->username_or_email)->plainTextToken;
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        $request->session()->invalidate();

        // regenerate CSRF token
        $request->session()->regenerateToken();
    }
}
