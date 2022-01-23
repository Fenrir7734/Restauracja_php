<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $p_filters = Category::pluck('id')->toArray();
        array_push($p_filters, '-1');
        $p_sort = ['name', 'id'];
        $p_direction = ['asc', 'desc'];

        if (!in_array(\request()->get('filter'), $p_filters) ||
            !in_array(\request()->get('sort'), $p_sort) ||
            !in_array(\request()->get('direction'), $p_direction)) {
            return redirect()->route('admin-products-preview', ['filter' => '-1', 'sort' => 'id', 'direction' => 'asc']);
        }

        $filter = \request()->get('filter') != '-1' ? ['category_id', '=', \request()->get('filter')] : ['category_id', '!=', '-1'];
        $sort = \request()->get('sort');
        $direction = \request()->get('direction');

        $products = Product::where([
            $filter
        ])
            ->orderBy($sort, $direction)
            ->paginate(10);

        //$products = Product::orderBy('id', 'asc')->paginate(10);
        $categories = Category::get();
        return view('/admin/products_preview', ['products' => $products, 'categories' => $categories, 'filters' => $p_filters]);
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
