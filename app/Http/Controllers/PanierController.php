<?php

namespace App\Http\Controllers;

use App\Http\Requests\Commanderequest;
use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class PanierController extends Controller
{
    public function VoirPanier()
    {
        $panier = Cart::content();
        $_total = Cart::subtotal();
        // dd($panier);

        return view('front.panier', [
            'panier' => $panier,
            'total' => $_total,
        ]);
    }

    public function AjouterPanier($id)
    {
        $product = Product::find($id);

        $cart = Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->imagePurl()]]);

        return to_route('voir_panier')->with('success', $product->name.' a ete ajoute a votre panier');
    }

    public function Augmenter_qty($id)
    {
        $product = Cart::get($id);
        $quantity = $product->qty;
        ++$quantity;
        // dd($quantity);
        Cart::update($id, $quantity);

        return to_route('voir_panier');
    }

    public function Diminuer_qty($id)
    {
        $product = Cart::get($id);
        $quantity = $product->qty;
        --$quantity;
        // dd($quantity);
        Cart::update($id, $quantity);

        return to_route('voir_panier');
    }

    public function SuprimmerItem($id)
    {
        Cart::remove($id);

        return to_route('voir_panier')->with('success', 'plat retire avec success');
    }

    public function VoirCommande($id)
    {
        $user = User::find($id);
        $cart = Cart::content();
        $total = Cart::subtotal();

        // dd($user);
        return view('front.commande', [
            'user' => $user,
            'panier' => $cart,
            'total' => $total,
        ]);
    }

    public function Commander(Commanderequest $commanderequest)
    {
        $commande = Commande::create($commanderequest->validated());
        // dd($commande);

        return to_route('voir_panier')->with('success', 'Votre commande a ete prise en compte un livreur vous conctatera');
    }
}
