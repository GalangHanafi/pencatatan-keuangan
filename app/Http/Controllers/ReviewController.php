<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userReview = Review::where('id', auth()->id())->first();

        $data = [
            'title' => 'Review',
            'breadcrumbs' => [
                'Review' => '#',
            ],
            'reviews' => Review::all(),
            'userReview' => $userReview,
            'content' => 'review.index',
        ];
        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $user = User::find($user->id);

        $request->validate([
            'content' => 'required|string'
        ]);

        // Check if the user has already submitted a review
        if (Review::where('id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You have already submitted a review.');
        }
        $user->review()->create([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        if ($review->id !== auth()->id()) {
            return redirect()->back()->with('error', 'You can only edit your own review.');
        }

        $data = [
            'title' => 'Edit Reviews',
            'breadcrumbs' => [
                'Review' => route('review.index'),
                'Edit Reviews' => '#',
            ],
            'review' => $review,
            'content' => 'review.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $user = auth()->user();

        if ($review->id !== auth()->id()) {
            return redirect()->back()->with('error', 'You can only update your own review.');
        }

        $request->validate([
            'content' => 'required|string'
        ]);

        $user->review()->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('review.index')->with('success', 'Reviews updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('review.index')->with('danger', '"' . $review->content . '" deleted successfully');
    }
}
