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
            'content' => 'features.index',
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
                'Account' => route('account.index'),
                'Create' => '#',
            ],
            'icons' => Icon::all(),
            'content' => 'features.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Menyimpan resource yang baru dibuat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Feature::create($request->all());

        return redirect()->route('features.index')->with('success', 'Feature berhasil dibuat.');
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
            'Account' => route('features.index'),
            'Edit' => '#',
        ],
        'icons' => Icon::all(),
        'feature' => $feature, // Single feature object to be edited
        'content' => 'features.edit',
    ];

    return view("admin.layouts.wrapper", $data);
}


    /**
     * Memperbarui resource yang spesifik.
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'icon' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $feature->update($request->all());

        return redirect()->route('features.index')->with('success', 'Feature berhasil diperbarui.');
    }

    /**
     * Menghapus resource yang spesifik.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('features.index')
                        ->with('success', 'Feature berhasil dihapus.');
    }
}
