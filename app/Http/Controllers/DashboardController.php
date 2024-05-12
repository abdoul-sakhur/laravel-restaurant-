<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\Product;
use App\Models\reservation;
use App\Models\Slider;
use App\Models\User;

class DashboardController extends Controller
{
    public function ShowDashboard()
    {
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $sliders = Slider::all()->count();
        $users = User::all()->count();
        $reservation = reservation::all()->count();
        $commande = Commande::all()->count();

        return view('admin.dashboard', [
            'categories' => $categories,
            'products' => $products,
            'sliders' => $sliders,
            'users' => $users,
            'reservation' => $reservation,
            'commande' => $commande,
        ]);
    }
}
