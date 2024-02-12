<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gallery');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_path.*' => 'image|max:5112',
            // 'tags.*' => 'array', // Validate tags as an array for each image
        ]);

        $galleryPaths = [];

        foreach ($request->file('image_path') as $key => $image) {
            $galleryPath = $image->store('gallery', 'public');
            $galleryPaths[] = $galleryPath;

            // Log or dump tags for debugging
            // \Log::info($request->input("tags.$key", []));

            Gallery::create([
                'image_path' => $galleryPath,
                // 'tags' => implode(',', $request->input("tags.$key", [])),
            ]);
        }

        // You can use $galleryPaths as needed, e.g., for displaying uploaded images.

        return redirect('gallery');
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
