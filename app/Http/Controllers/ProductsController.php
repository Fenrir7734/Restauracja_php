<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('/admin/products_preview', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('/admin/products_new', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:3|max:60',
            'note' => 'required|min:10|max:65535',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|between:0,9999.99'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img/menu/meals'), $imageName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->note;
        $product->photo = $imageName;
        $product->price = $request->price;
        $product->category_id = $request->category;

        if ($product->save()) {
            return redirect()->route('admin-products-preview');
        }
        return \redirect('error');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view(
            'admin/products_edit',
            ['categories' => $categories, 'product' => $product]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:60',
            'note' => 'required|min:10|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|between:0,9999.99'
        ]);
        $product = Product::find($id);

        if ($request->image) {
            unlink(public_path('img/menu/meals') . '/' . $product->photo);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/menu/meals'), $imageName);
            $product->photo = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->note;
        $product->price = $request->price;
        $product->category_id = $request->category;

        if ($product->save()) {
            return redirect()->route('admin-products-preview');
        }
        return \redirect('error');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path('img/menu/meals') . '/' . $product->photo);
        if ($product->delete()) {
            return redirect()->route('admin-products-preview');
        }
        return \redirect('error');
    }
}
