<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Icon;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);

        $customCategories = $user->categories()->get();
        $defaultCategories = Category::where('user_id', null)->get();

        $data = [
            'title' => 'Category',
            'breadcrumb' => [
                'Category' => route('category.index'),
            ],
            'defaultCategories' => $defaultCategories,
            'customCategories' => $customCategories,
            'content' => 'category.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Category',
            'breadcrumb' => [
                'Category' => route('category.index'),
                'Create' => route('category.create'),
            ],
            'icons'         => Icon::all(),
            'content' => 'category.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
        ]);


        // Category::create($data);
        $user->categories()->create($data);

        return redirect()->to('category')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // check if user->id == category->user_id
        $userId = auth()->user()->id;
        $user = User::find($userId);
        if ($user->id !== $category->user_id) {
            // abort(404);
            abort(403);
        }

        $data = [
            'title' => 'Edit Category',
            'breadcrumb' => [
                'Category' => route('category.index'),
                'Edit' => route('category.edit', $category->id),
            ],
            'icons'         => Icon::all(),
            'category' => $category,
            'content' => 'category.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
        ]);


        // Category::create($data);
        $category->update($data);

        return redirect()->to('category')->with('success', 'Category updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // check if user->id == category->user_id
        $userId = auth()->user()->id;
        $user = User::find($userId);
        if ($user->id !== $category->user_id) {
            // abort(404);
            abort(403);
        }

        $category->delete();

        return redirect()->route('category.index')->with('danger', '"' . $category->name . '" deleted successfully');
    }
}
