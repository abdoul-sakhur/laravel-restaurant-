<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        // $categories = category::orderBy('created_at', 'desc');
        // dd($categories);
        $categories = Category::query();
        $search = $request->validated('search');
        if ($search) {
            $categories = Category::where('name', 'like', "%{$search}%");
        } else {
            $categories = Category::query();
        }

        return view('admin.category_liste', [
            'categories' => $categories->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();

        return view('admin.category_form', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        $imageP = $request->validated('image');

        if ($request->hasFile('image')) {
            $imageP = $request->file('image');

            $imagePpath = $imageP->storePublicly('docImage', 'public');

            $category->update([
                'image' => $imagePpath,
            ]);
        }

        return to_route('admin.category.index')->with('success', 'la categorie a ete ajouer avec success');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category_form', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $imageP = $request->validated('image');

        if ($request->hasFile('image')) {
            $imageP = $request->file('image');

            $imagePpath = $imageP->storePublicly('docImage', 'public');

            $category->update([
                'image' => $imagePpath,
            ]);
        }

        return to_route('admin.category.index')->with('success', 'la categorie a ete modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('admin.category.index')->with('success', 'la categorie a ete suprrime avec success');
    }
}
