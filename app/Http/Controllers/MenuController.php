<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class MenuController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'asc')->get();
        $products = Product::orderBy('category_id', 'asc')->get();
        $cart = session()->get('cart');
        if ($cart == null) {
            $cart = [];
        }
        return view('menu', ['categories' => $categories, 'products' => $products, 'cart' => $cart]);
    }

    public function cart() {
        return view('cart');
    }

    public function addToCart($id) {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            $cart[$id] = [
                $id => [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total_price' => $product->price
                ]
            ];
        } else {
            $cart[$id][$id]['quantity']++;
            $cart[$id][$id]['total_price'] = $cart[$id][$id]['price'] * $cart[$id][$id]['quantity'];
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
