<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Umkm;
use App\Models\Categories;
// use Illuminate\Routing\Controller;
use App\Http\Requests\StoreUmkmRequest;
use App\Http\Requests\UpdateUmkmRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if (Auth::user()->is_admin) {
            $umkm = Umkm::latest()->paginate(12);
        } else {
            $umkm = Umkm::where('user_id', Auth::user()->id)->paginate(12);
        }

        return view('dashboard.umkm.index', [
            "umkm" => $umkm
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('dashboard.umkm.create', [
            'kategori' => Categories::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUmkmRequest $request) {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $images = $validated['image'];
            $validated['image'] = $request->file("image.0")->store('foto');
            $umkm = Umkm::create($validated);

            for ($i = 1; $i < count($images); $i++) {
                if ($request->file("image.$i")) {
                    $foto['umkm_id'] = $umkm->id;
                    $foto['image'] = $request->file("image.$i")->store('foto');
                    Foto::create($foto);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return redirect(route('umkm.index'))->with('success', 'umkm berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $kategori, Umkm $umkm) {
        if (!($kategori->id == $umkm->categories_id)) {
            return back();
        }

        return view('umkm.show', [
            "categories" => $kategori,
            "umkm" => $umkm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm) {
        return view('dashboard.umkm.edit', [
            'umkm' => $umkm,
            'kategori' => Categories::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUmkmRequest $request, Umkm $umkm) {
        // dd($request->validated());
        $validated = $request->validated();
        try {
            DB::beginTransaction();
            if (!isset($validated['image'])) {
                $validated['image'] = $umkm['image'];
            } else {

                $images = $validated['image'];
                Storage::delete($umkm["image"]);
                Foto::where("umkm_id", $umkm->id)->delete();
                $validated['image'] = $request->file("image.0")->store('foto');
                for ($i = 0; $i < count($images); $i++) {
                    if ($request->file("image.$i")) {
                        $foto['umkm_id'] = $umkm->id;
                        $foto['image'] = $request->file("image.$i")->store('foto');
                        Foto::create($foto);
                    }
                }
            }
            $umkm->update($validated);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return 'Terjadi kesalahan: ' . $e->getMessage();
        }

        return redirect(route('umkm.index'))->with('success', 'umkm berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm) {
        // delete post`s image
        Storage::delete($umkm["image"]);

        Foto::where("umkm_id", $umkm->id)->delete();

        // delete record on database
        $umkm->delete();

        return redirect(route("umkm.index")) // redirect to route umkm.index
            ->with("success", "UMKM berhasil dihapus"); // set session to give message
    }
}
