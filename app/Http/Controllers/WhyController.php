<?php

namespace App\Http\Controllers;


use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = auth()->user();

        $ulasan = Why::all(); // Ambil data ulasan


        $data = [
            'title' => 'Why',
            'breadcrumbs' => [
                'Why' => '#',
            ],

            'ulasan' => $ulasan, // Tambahkan ulasan ke dalam array data
            'content' => 'why.index',
        ];
        // dd($data);
        return view("admin.layouts.wrapper", $data);
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
        $request->validate([
            'content' => 'required|string'
        ]);

        $review = new Why();
        $review->name = auth()->user()->name;
        $review->content = $request->input('content');
        $review->save();

        return redirect()->back()->with('success', 'Ulasan submitted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Why $why)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Why $why)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Why $why)
    {
        $request->validate([

            'komentar' => 'required|string',

        ]);

        $ulasan = Why::findOrFail($why);

        $ulasan->update([

            'komentar' => $request->input('komentar'),

        ]);

        return redirect()->route('why.index')->with('success', 'Ulasan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Why $why)
    {
        $why->delete();
        return redirect()->route('why.index')->with('danger', '"' . $why->content . '" deleted successfully');
    }
}
