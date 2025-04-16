<?php

namespace App\Http\Controllers;

use App\Models\CustomTour;
use Illuminate\Http\Request;

class CustomTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $tours = CustomTour::orderBy('created_at', 'desc')->paginate($perPage);

        return response()->json([
            'data' => $tours->items(),    
            'total' => $tours->total(),   
            'current_page' => $tours->currentPage(),
            'last_page' => $tours->lastPage(),
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'group_size' => 'required|integer|min:1',
            'destinations' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'duration' => 'required|integer|min:1',
            'interests' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);

        CustomTour::create($validated);

        return response()->json([
            'message' => 'Custom tour request submitted successfully.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomTour $customTour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomTour $customTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomTour $customTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomTour $customTour)
    {
        //
    }

    public function latest(Request $request)
    {
       

        $contacts = CustomTour::latest()->take(10)->get();

        return response()->json($contacts);
    }
}
