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
        $query = Blog::query()
            ->where('published_date', '<=', now())
            ->orderBy('published_date', 'desc');

        // Search functionality
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%')
                    ->orWhereJsonContains('tags', $request->search);
            });
        }

        // Filter by category
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Pagination
        $perPage = $request->per_page ?? 10;
        $blogs = $query->paginate($perPage);

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:255',
            'author' => 'required|string|max:255',
            'author_avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'featured' => 'sometimes|boolean',
            'published_date' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/blogs');
                $validated['image'] = Storage::url($path);
            }

            // Handle author avatar upload
            if ($request->hasFile('author_avatar')) {
                $path = $request->file('author_avatar')->store('public/authors');
                $validated['author_avatar'] = Storage::url($path);
            }

            // Create slug
            $validated['slug'] = Str::slug($validated['title']);

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

    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        // Increment views
        $blog->increment('views');

        return response()->json([
            'data' => $blog
        ]);
    }

    // Add update and destroy methods as needed
}