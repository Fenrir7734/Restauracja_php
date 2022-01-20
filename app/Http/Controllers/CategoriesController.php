<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('/admin/categories_preview', ['categories' => $categories]);
    }

    public function create() {
        return view('/admin/category_new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:60',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img/menu/banners'), $imageName);

        $category = new Category();
        $category->name = $request->name;
        $category->photo = $imageName;

        if ($category->save()) {
            return redirect()->route('admin-categories-preview');
        }
        return \redirect('error');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin/category_edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:40',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $category = Category::find($id);

        if ($request->image) {
            unlink(public_path('img/menu/banners') . '/' . $category->photo);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/menu/banners'), $imageName);
            $category->photo = $imageName;
        }
        $category->name = $request->name;

        if ($category->save()) {
            return redirect()->route('admin-categories-preview');
        }
        return \redirect('error');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(public_path('img/menu/banners') . '/' . $category->photo);
        if ($category->delete()) {
            return redirect()->route('admin-categories-preview');
        }
        return \redirect('error');
    }
}
