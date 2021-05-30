<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    
    public function index(): View
    {
        $categories = category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    
    public function create(): View
    {
        $categories = category::all();
       return view('admin.categories.create', compact('categories'));
    }

    
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'unique:categories,slug'],
            'category_id' =>['nullable', 'exists:categories,id']
        ]);

        category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Successfully!');
    }

   
    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    
    public function edit(Category $category)
    {
        $categories = category::where('id', '!=', $category->id)->get();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    
    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->validate([
            'name'          => ['required'],
            'slug'          => ['required', 'unique:categories,slug,' . $category->id],
            'category_id'   => ['nullable', 'exists:categories,id']
        ]);

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Updated!');
    }

    
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Deleted Successfully!');
    }
}

