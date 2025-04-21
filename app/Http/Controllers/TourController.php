<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\Country;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $tours = Tour::query()
            ->when($request->has('search'), function ($query) use ($request) {
                $search = $request->input('search');
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%")
                    ->orWhere('region', 'like', "%{$search}%");
            })
            ->when($request->has('is_featured'), function ($query) use ($request) {
                $query->where('is_featured', $request->boolean('is_featured'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'data' => $tours->items(),
            'total' => $tours->total(),
            'current_page' => $tours->currentPage(),
            'per_page' => $tours->perPage(),
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
        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tours,slug',
            'country_id' => 'required|exists:countries,id',
            'region' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'duration' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'is_featured' => 'boolean',
            'min_group_size' => 'nullable|integer|min:1',
            'max_group_size' => 'nullable|integer|min:1',
            'included' => 'nullable',
            'not_included' => 'nullable',
            'itinerary' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = $request->file('image')->store('tours', 'public');

        $tour = Tour::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->slug),
            'country' => Country::find($request->country_id)->name,
            'region' => $request->region,
            'destination' => $request->destination,
            'image' => asset('storage/' . $imagePath),
            'short_description' => $request->short_description,
            'full_description' => $request->full_description,
            'duration' => $request->duration,
            'price' => $request->price,
            'is_featured' => filter_var($request->is_featured, FILTER_VALIDATE_BOOLEAN),
            'min_group_size' => $request->min_group_size,
            'max_group_size' => $request->max_group_size,
            'included' => $request->included,
            'not_included' => $request->not_included,
            'itinerary' => $request->itinerary,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($tour, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        return response()->json($tour);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $tour->load('country');

        return response()->json($tour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'details' => 'nullable|string',
            'duration' => 'nullable|string',
            'price' => 'required|numeric',
            'is_featured' => 'boolean',
            'min_group_size' => 'nullable|integer',
            'max_group_size' => 'nullable|integer',
            'highlights' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'destination' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tours/images', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('tours/cover_images', 'public');
            $validatedData['cover_image'] = $coverImagePath;
        }

        // Update the tour
        $tour->update($validatedData);

        return response()->json([
            'message' => 'Tour updated successfully.',
            'tour' => $tour
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete(); // This will just set deleted_at

        return response()->json(['message' => 'Tour archived successfully.']);
    }
    public function restore($id)
    {
        $tour = Tour::onlyTrashed()->findOrFail($id);
        $tour->restore();

        return response()->json(['message' => 'Tour restored successfully.']);
    }
    public function destroy($id)
    {
        $tour = Tour::onlyTrashed()->findOrFail($id);
        $tour->forceDelete();

        return response()->json(['message' => 'Tour permanently deleted.']);
    }
}
