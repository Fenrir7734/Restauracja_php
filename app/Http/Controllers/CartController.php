<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $validator = Validator::make($request->all(), [
            'quantity' => [
                'required',
                'digits_between:1,99'
            ]
        ]);

        if ($validator->fails()) {
            $request->session()->put(['err' => 'Liczba powinna być pomiędzy 1 a 99']);
            return response()->json(array(
                'success' => false
            ));

        }

        $id = $request->id;
        $quantity = $request->quantity;
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            $cart[$id] = [
                $id => [
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'total_price' => $product->price * $quantity
                ]
            ];
        } else {
            $cart[$id][$id]['quantity'] += $quantity;
            $cart[$id][$id]['total_price'] = $cart[$id][$id]['price'] * $cart[$id][$id]['quantity'];
        }
        session()->put('cart', $cart);
        $request->session()->put(['msg' => 'Dodano do koszyka']);
        return response()->json(array(
            'success' => true
        ));
    }

    public function removeAll() {
        session()->remove('cart');
        return redirect()->back();
    }

    public function updateCart(Request $request) {
        $validator = Validator::make($request->all(), [
            'quantity' => [
                'required',
                'digits_between:1,99'
            ]
        ]);

        if ($validator->fails()) {
            session()->put(['err' => "Liczba musi być pomiędzy 1 a 99"]);
            return;
        }

        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            if (isset($cart)) {
                $id = $request->id;
                $cart[$id][$id]['quantity'] = $request->quantity;
                $cart[$id][$id]['total_price'] = $cart[$id][$id]['price'] * $cart[$id][$id]['quantity'];
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
