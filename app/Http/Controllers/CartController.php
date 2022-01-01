<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

    public function removeAll() {
        session()->remove('cart');
        return redirect()->back();
    }

    public function updateCart(Request $request) {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart)) {
                $cart[$request->id][$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }
    }

    public function removeFromCart(Request $request) {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart)) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
}