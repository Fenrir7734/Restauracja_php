<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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

    public function addToCart($id) {
        echo "<script>console.log('dodane $id')</script>";
    }
}
