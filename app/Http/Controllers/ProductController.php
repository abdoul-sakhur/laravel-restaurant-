<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $products = Product::query();

        $categories = Category::all();
        if ($request->input('search')) {
            $products = Product::where('name', 'like', "%{$request->input('search')}%");
        } elseif ($request->input('search') == null || $request->input('search') == '') {
            $products = Product::query();
        }

        return view('admin.product_liste', [
            'products' => $products->paginate(4),
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name', 'id');
        // dd($categories);

        return view('admin.product_form', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        $imageP = $request->validated('imageP');
        $imageS = $request->validated('imageS');
        $imageT = $request->validated('imageT');
        $product->categories()->sync($request->validated('category'));

        if ($request->hasFile('imageP') && $request->hasFile('imageS') && $request->hasFile('imageT')) {
            $imageP = $request->file('imageP');
            $imageS = $request->file('imageS');
            $imageT = $request->file('imageT');

            $imagePpath = $imageP->storePublicly('docImage', 'public');
            $imageSpath = $imageS->storePublicly('docImage', 'public');
            $imageTpath = $imageT->storePublicly('docImage', 'public');
            $product->update([
                'imageP' => $imagePpath,
                'imageS' => $imageSpath,
                'imageT' => $imageTpath,
            ]);
        }

        return to_route('admin.product.index')->with('success', 'le plat a ete ajouer avec success');
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
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id');
        // dd($categories);

        return view('admin.product_form', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        $imageP = $request->validated('imageP');
        $imageS = $request->validated('imageS');
        $imageT = $request->validated('imageT');
        $product->categories()->sync($request->validated('category'));
        if ($request->hasFile('imageP') && $request->hasFile('imageS') && $request->hasFile('imageT')) {
            $imageP = $request->file('imageP');
            $imageS = $request->file('imageS');
            $imageT = $request->file('imageT');

            $imagePpath = $imageP->storePublicly('docImage', 'public');
            $imageSpath = $imageS->storePublicly('docImage', 'public');
            $imageTpath = $imageT->storePublicly('docImage', 'public');
            $product->update([
                'imageP' => $imagePpath,
                'imageS' => $imageSpath,
                'imageT' => $imageTpath,
            ]);
        }

        return to_route('admin.product.index')->with('success', 'le plat a ete modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.product.index')->with('success', 'le plat a ete suprrime avec success');
    }
}
