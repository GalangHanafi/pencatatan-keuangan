<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // current user
        $user = auth()->user();

        $data = [
            'title' => 'faq',
            'breadcrumbs' => [
                'faq' => '#',
            ],
            'faqs' => Faq::all(),
            'content' => 'faq.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $data = [
            'title' => 'faq',
            'breadcrumbs' => [
                'faq' => route('faq.index'),
                'create' => '#',
            ],

            'content' => 'faq.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // create faq
        Faq::create($data);
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        // Not implemented
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $user = auth()->user();

        $data = [
            'title' => 'Edit FAQ',
            'breadcrumbs' => [
                'faq' => route('faq.index'),
                'edit' => '#',
            ],
            'faq' => $faq,
            'content' => 'faq.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        // update faq
        $faq->update($data);
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        // delete faq
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }
}

