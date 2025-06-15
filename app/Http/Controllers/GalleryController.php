<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function create()
    {
        $images = GalleryImage::latest()->get();
        return view('livewire.backend.gallery-manager', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $filename = Str::uuid() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->storeAs('public/gallery', $filename);

        GalleryImage::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => "storage/gallery/{$filename}",
        ]);

        return redirect()->back()->with('success', 'Image uploaded.');
    }
}