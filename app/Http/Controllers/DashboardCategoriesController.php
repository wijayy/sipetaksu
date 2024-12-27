<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCategoriesController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('dashboard.kategori.index', [
            'kategori' => Categories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            "image" => "required|file|image",
            "nama" => "required|string",
        ]);

        $validated['image'] = $request->file("image")->store('kategori');

        Categories::create($validated);

        return redirect(route('dashboard.kategori.index'))->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $kategori) {
        return view('dashboard.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $kategori) {
        $validated = $request->validate([
            "image" => "file|image",
            "nama" => "required|string",
        ]);

        if (isset($validated['image'])) {
            Storage::delete($kategori['image']);
            $validated['image'] = $request->file("image")->store('kategori');
        } else {
            $validated['image'] = $kategori['image'];
        }

        $kategori->update($validated);

        return redirect(route('dashboard.kategori.index'))->with('success', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $kategori) {
        Storage::delete($kategori->image);

        $kategori->delete();

        return redirect(route('dashboard.kategori.index'))->with('success', 'Kategori berhasil dihapus');
    }
}
