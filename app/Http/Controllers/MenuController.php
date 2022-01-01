<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class MenuController extends Controller
{
    public function index() {
        $categories = Category::orderBy('id', 'asc')->get();
        $products = Product::orderBy('category_id', 'asc')->get();
        return view('menu', ['categories' => $categories, 'products' => $products]);
    }

    public function cart() {
        return view('cart');
    }
}
