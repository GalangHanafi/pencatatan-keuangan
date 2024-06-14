<?php

namespace App\Http\Controllers;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::all();
        $data = [
            'title' => 'Benefit',
            'breadcrumbs' => [
                'Benefit' => '#',
            ],
            'benefit' => $benefits,
            'content' => 'benefit.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Benefit',
            'breadcrumbs' => [
                'Benefit' => route('benefit.index'),
                'Create' => '#',
            ],
            'bene' => Benefit::all(),
            'content' => 'benefit.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'benefit' => 'required|string|max:255',
        ]);

        // Create a new benefit
        Benefit::create([
            'benefit' => $validated['benefit'],
        ]);

        // Redirect back with a success message
        return redirect()->route('benefit.index')->with('success', 'Benefit created successfully.');
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
    $benefit = Benefit::findOrFail($id);

    $data = [
        'title' => 'Edit benefit',
        'breadcrumbs' => [
            'benefit' => route('benefit.index'),
            'Edit' => '#',
        ],
        'benefit' => $benefit, // Pass the specific benefit instance
        'content' => 'benefit.edit',
    ];

    return view("admin.layouts.wrapper", $data);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request
    $validated = $request->validate([
        'benefit' => 'required|string|max:255',
    ]);

    // Find the specific benefit and update it
    $benefit = Benefit::findOrFail($id);
    $benefit->update([
        'benefit' => $validated['benefit'],
    ]);

    // Redirect back with a success message
    return redirect()->route('benefit.index')->with('success', 'Benefit updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $benefit = Benefit::findOrFail($id);
    $benefit->delete();

    return redirect()->route('benefit.index')->with('success', 'Benefit deleted successfully.');
}

}
