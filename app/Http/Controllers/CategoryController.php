<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            'content' => 'category.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = [
            'title' => 'Edit Category',
            'breadcrumb' => [
                'Category' => route('category.index'),
                'Edit' => route('category.edit', $category->id),
            ],
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
