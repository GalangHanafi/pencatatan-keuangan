<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Icon;

class FeatureController extends Controller
{
    /**
     * Menampilkan daftar resource.
     */
    public function index()
    {
        $features = Feature::all();
        $data = [
            'title' => 'Feature',
            'breadcrumbs' => [
                'features' => '#',
            ],
            'features' => $features,
            'content' => 'feature.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Menampilkan form untuk membuat resource baru.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Feature',
            'breadcrumbs' => [
                'Feature' => route('feature.index'),
                'Create' => '#',
            ],
            'content' => 'feature.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Menyimpan resource yang baru dibuat.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $data['icon'] = 'bx bx-' . $data['icon'];

        Feature::create($data);

        return redirect()->route('feature.index')->with('success', 'Feature berhasil dibuat.');
    }

    /**
     * Menampilkan resource yang spesifik.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit resource yang spesifik.
     */
    public function edit(Feature $feature)
    {
        $data = [
            'title' => 'Edit Feature',
            'breadcrumbs' => [
                'Feature' => route('feature.index'),
                'Edit' => '#',
            ],
            'feature' => $feature, // Single feature object to be edited
            'content' => 'feature.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }


    /**
     * Memperbarui resource yang spesifik.
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $data['icon'] = 'bx bx-' . $data['icon'];
        $feature->update($data);

        return redirect()->route('feature.index')->with('success', 'Feature berhasil diperbarui.');
    }

    /**
     * Menghapus resource yang spesifik.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('feature.index')
            ->with('success', 'Feature berhasil dihapus.');
    }
}
