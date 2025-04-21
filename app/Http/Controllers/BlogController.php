<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        // Optional: Only show published blogs (uncomment if needed)
        // $query->where('published_at', '<=', now());

        $query->orderBy('published_at', 'desc');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%')
                    ->orWhereJsonContains('tags', $request->search);
            });
        }

        // Filter by category
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        // Pagination
        $perPage = $request->per_page ?? 10;
        $blogs = $query->paginate($perPage);

        // Format and return response
        return response()->json([
            'data' => $blogs->items(),
            'total' => $blogs->total(),
            'current_page' => $blogs->currentPage(),
            'per_page' => $blogs->perPage(),
            'last_page' => $blogs->lastPage(),
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string|max:255',
            'tags' => 'nullable',
            'tags.*' => 'string|max:255',
            'author_name' => 'required|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'featured' => 'sometimes|boolean',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);
    
        try {
            // Handle image upload
            $imageUrl = null;
            if ($request->hasFile('image_url')) {
                $path = $request->file('image_url')->store('blogs', 'public');
                $imageUrl = Storage::url($path);
            }
    
            // Handle author avatar upload
            $authorAvatarUrl = null;
            if ($request->hasFile('author_avatar')) {
                $path = $request->file('author_avatar')->store('authors', 'public');
                $authorAvatarUrl = Storage::url($path);
            }
    
            // Add slug
            $validated['slug'] = Str::slug($validated['title']);
    
            // Attach uploaded URLs
            $validated['image_url'] = $imageUrl;
            $validated['author_avatar'] = $authorAvatarUrl;
    
            $blog = Blog::create($validated);
    
            return response()->json([
                'message' => 'Blog post created successfully',
                'data' => $blog
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating blog post',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function edit($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
        return response()->json($blog);
    }
    

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        // Increment views
        $blog->increment('views');

        return response()->json([
            'data' => $blog
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'tags' => 'nullable',
            'tags.*' => 'string|max:255',
            'author_name' => 'required|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'featured' => 'sometimes|boolean',
            'published_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('blogs/images', 'public');
            $validatedData['image_url'] = $imagePath;
        }

      
        // Update the tour
        $blog->update($validatedData);

        return response()->json([
            'message' => 'Blog updated successfully.',
            'blog' => $blog
        ]);
    }
    public function archive($id)
    {
        $tour = Blog::findOrFail($id);
        $tour->delete(); // This will just set deleted_at

        return response()->json(['message' => 'Blog archived successfully.']);
    }
    public function restore($id)
    {
        $tour = Blog::onlyTrashed()->findOrFail($id);
        $tour->restore();

        return response()->json(['message' => 'Blog restored successfully.']);
    }
    public function destroy($id)
    {
        $tour = Blog::onlyTrashed()->findOrFail($id);
        $tour->forceDelete();

        return response()->json(['message' => 'Blog permanently deleted.']);
    }
}
