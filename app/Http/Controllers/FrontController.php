<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontController extends Controller
{
    public function index()
    {
        $Category_resis = Category::where('name', 'Viandes et volailles')->first();
        $Category_dessert = Category::where('name', 'Céréales')->first();
        
        // dd($Category_resis);
        $populare_products = Product::limit(4)->get();
        $resistant_product = $Category_resis->products()->limit(4)->get();
        $dessert_product = $Category_dessert->products()->limit(4)->get();
        // dd($dessert_product);
        $content_cart = Cart::content()->count();

        return view('front.index', [
            'populare_products' => $populare_products,
            'resistant_product' => $resistant_product,
            'cereals' => $dessert_product,
            'content_cart' => $content_cart,
           
        ]);
    }

    public function menu()
    {
        $categories = Category::all();
        $products = Product::all();
        $content_cart = Cart::content()->count();

        return view('front.menu', [
            'categories' => $categories,
            'products' => $products,
            'content_cart' => $content_cart,
        ]);
    }

    public function show_by_category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = $category->products()->get();
        // dd($products);

        return view('front.menu', [
            'products' => $products,
            'categories' => $categories, ]);
    }

    public function voir_details($id)
    {
        $product = Product::find($id);
        $content_cart = Cart::content()->count();

        return view('front.voir_details', [
            'product' => $product,
            'content_cart' => $content_cart,
        ]);
    }

    public function contact(){
        return view('front.contact');
    }
    public function apropos(){
        return view('front.apropos');
    }
}
