<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $cats = Categories::orderby('id', 'desc')->get();
        return view('Admin/Categories', compact('cats'));
    }
    public function delete($id)
    {
        Categories::find($id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories|min:3|max:40'
        ]);
        $id = $request->id;
        Categories::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories|min:3|max:40'
        ]);
        Categories::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
