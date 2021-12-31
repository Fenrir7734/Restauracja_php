<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuController extends Controller
{
    public function index() {
        $products = Product::orderBy('category_id', 'asc')->get();
        return view('menu', ['products' => $products]);
    }

    public function cart() {
        return view('cart');
    }
}
