<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Component;

class PageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(?string $slug = null)
    {
        $slug = $slug ?? 'home';

        $forbidden = ['login', 'register', 'dashboard', 'settings', 'admin'];
        if (in_array($slug, $forbidden)) {
            abort(404);
        }

        $page = Page::where('slug', $slug)->firstOrFail();

        $components = Component::where('page_id', $page->id)
            ->orderBy('order')
            ->get();

        return view('welcome', compact('page', 'components'));
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
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if ($page->children()->exists()) {
            return back()->with('error', 'Delete child pages first.');
        }

        if ($page->is_default) {
            return back()->with('error', 'Cannot delete default pages.');
        }

        $page->delete();
        return back()->with('success', 'Page deleted.');
    }

}
