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
        $userReview = Why::where('id', auth()->id())->first();

        $data = [
            'title' => 'Why',
            'breadcrumbs' => [
                'Why' => '#',
            ],
            'ulasan' => Why::all(),
            'userReview' => $userReview,
            'content' => 'why.index',
        ];
        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        // Check if the user has already submitted a review
        if (Why::where('id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You have already submitted a review.');
        }
        $review = new Why();
        $review->id = auth()->id();
        $review->name = auth()->user()->name;
        $review->content = $request->input('content');
        $review->save();

        return redirect()->back()->with('success', 'Ulasan submitted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Why $why)
    {
        if ($why->id !== auth()->id()) {
            return redirect()->back()->with('error', 'You can only edit your own review.');
        }

        $data = [
            'title' => 'Edit Ulasan',
            'breadcrumbs' => [
                'Why' => route('why.index'),
                'Edit Ulasan' => '#',
            ],
            'ulasan' => $why,
            'content' => 'why.edit',
        ];
        return view("admin.layouts.wrapper", $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Why $why)
    {
        if ($why->id !== auth()->id()) {
            return redirect()->back()->with('error', 'You can only update your own review.');
        }

        $request->validate([
            'content' => 'required|string'
        ]);

        $why->content = $request->input('content');
        $why->save();

        return redirect()->route('why.index')->with('success', 'Ulasan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Why $why)
    {
        $why->delete();
        return redirect()->route('why.index')->with('danger', '"' . $why->content . '" deleted successfully');
        $why->delete();
        return redirect()->route('why.index')->with('danger', '"' . $why->content . '" deleted successfully');
    }
}
