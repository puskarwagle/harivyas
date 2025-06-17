<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = GalleryImage::latest()->get();
        return view('backend.gallery-manager', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'tags' => array_filter(array_map('trim', explode(',', $request->input('tags')))),
        ]);

        $request->validate([
            'photo' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'show_in_homepage' => 'nullable|boolean',
            'location' => 'nullable|string|max:255',
            'year' => 'nullable|string',
        ]);

        $filename = Str::uuid() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->storeAs('gallery', $filename, 'public');

        GalleryImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => "storage/gallery/{$filename}",
            'tags' => $request->tags ?? [],
            'show_in_homepage' => $request->boolean('show_in_homepage'),
            'location' => $request->location,
            'year' => $request->year,
        ]);

        return redirect()->back()->with('success', 'Image uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Move the specified resource to the trash (soft delete).
     */
    public function trash(string $id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->delete();

        return redirect()->back()->with('success', 'Image moved to trash.');
    }

    /**
     * Get all trashed images.
     */
    public function getTrash()
    {
        $trashedImages = GalleryImage::onlyTrashed()->latest()->get();

        return view('gallery.trash', compact('trashedImages'));
    }

    /**
     * Restore a soft-deleted image.
     */
    public function restore(string $id)
    {
        $image = GalleryImage::onlyTrashed()->findOrFail($id);
        $image->restore();

        return redirect()->back()->with('success', 'Image restored successfully.');
    }

    /**
     * Permanently delete the specified resource.
     */
    public function destroy(string $id)
    {
        $image = GalleryImage::onlyTrashed()->findOrFail($id);
        $image->forceDelete();

        return redirect()->back()->with('success', 'Image permanently deleted.');
    }
}
