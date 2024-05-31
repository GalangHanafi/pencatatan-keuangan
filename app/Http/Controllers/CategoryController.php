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
        $user = auth()->user();
        // $user = User::find($user->id);

        $customCategories = $user->categories()->where('is_default', 0)->get();
        $defaultCategories = $user->categories()->where('is_default', 1)->get();

        $data = [
            'title' => 'Category',
            'breadcrumbs' => [
                'Category' => "#",
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
            'breadcrumbs' => [
                'Category' => route('category.index'),
                'Create' => '#',
            ],
            'icons' => Icon::all(),
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
        $user = auth()->user();
        // $user = User::find($user->id);

        // validation
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
            'type' => 'in:income,expense,saving',
        ]);

        // create category
        $user->categories()->create($data);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
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
        // current user
        $user = auth()->user();

        // authorization
        if ($user->id !== $category->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Edit Category',
            'breadcrumbs' => [
                'Category' => route('category.index'),
                'Edit' => '#',
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
        $user = auth()->user();

        // authorization
        if ($user->id !== $category->user_id) {
            abort(403);
        }

        // validation
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
            'type' => 'in:income,expense,saving',
        ]);

        // update category
        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // current user
        $user = auth()->user();

        // authorization
        if ($user->id !== $category->user_id) {
            abort(403);
        }

        // delete category
        $category->delete();

        return redirect()->route('category.index')->with('danger', '"' . $category->name . '" deleted successfully');
    }
}
