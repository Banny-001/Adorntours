<?php



// app/Http/Controllers/ResourceController.php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $resources = Resource::paginate($perPage);

        // Add full URL for file
        $resources->getCollection()->transform(function ($resource) {
            return [
                'id' => $resource->id,
                'icon' => $resource->icon,
                'title' => $resource->title,
                'description' => $resource->description,
                'link' => $resource->link,
                'file_path' => asset('storage/' . $resource->link),
                'created_at' => $resource->created_at,
                'updated_at' => $resource->updated_at,
            ];
        });

        return response()->json($resources);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'link' => 'nullable|string',
            'file_path' => 'nullable|file'
        ]);
        if ($request->hasFile('file_path')) {
            // Store the file and get the pathgt
            $filePath = $request->file('file_path')->store('resources', 'public');
            $data['link'] = $filePath; // Store file path in 'link' column
        }

        return Resource::create($data);
    }

    public function show($id)
    {
        return Resource::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $data = $request->validate([
            'icon' => 'string',
            'title' => 'string',
            'description' => 'string',
            'link' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf|max:10240'
        ]);
        if ($request->hasFile('file_path')) {
            // Delete the old file if it exists
            if ($resource->link && Storage::exists('public/' . $resource->link)) {
                Storage::delete('public/' . $resource->link);
            }

            // Store the new file and get the path
            $filePath = $request->file('file_path')->store('resources', 'public');
            $data['link'] = $filePath; // Update the file link
        }

        $resource->update($data);
        return $resource;
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);

        // Delete the file if it exists
        if ($resource->link && Storage::exists('public/' . $resource->link)) {
            Storage::delete('public/' . $resource->link);
        }

        $resource->delete();
        return response()->json(['message' => 'Resource deleted']);
    }
    public function download($id)
    {
        $resource = Resource::findOrFail($id);

        // This matches the public URL path like /storage/resources/xxx.pdf
        $publicFilePath = public_path('storage/' . $resource->link);

        if (!file_exists($publicFilePath)) {
            return response()->json([
                'error' => 'File not found in public path',
                'path_checked' => $publicFilePath,
            ], 404);
        }

        return response()->download($publicFilePath, $resource->title . '.pdf');
    }
}
