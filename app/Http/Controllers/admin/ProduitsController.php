<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produits;
use App\Models\Produitss;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProduitsController extends Controller
{
    public function index()
    {
        $cats = Categories::latest()->get();
        $pros = Produits::orderby('id', 'desc')->get();
        return view('Admin/Produits', compact('cats', 'pros'));
    }
    public function procat($name)
    {
        $cats = Categories::latest()->get();
        $pros = Produits::where('categorie', $name)->get();
        return view('Admin/CatPro', compact('pros','name', 'cats'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40',
            'Description' => 'required|string|min:3|max:500',
            'prix' => 'required|numeric',
            'img' => 'required|mimes:png,jpeg,jpg'
        ]);
        $image = $request->file('img');
        $image_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/Produits' . $image_gen);
        $save_url = 'upload/Produits' . $image_gen;

        Produits::insert([
            'name' => $request->name,
            'img' => $save_url,
            'price' => $request->prix,
            'description' => $request->Description,
            'categorie' => $request->categorie,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        Produits::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $id = $request->id_M;
        $old_img = $request->old_img;
        if ($request->file('img_M')) {
            unlink($old_img); 
            $image = $request->file('img_M');
            $image_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/Produits' . $image_gen);
            $save_url = 'upload/Produits' . $image_gen;

            Produits::findOrFail($id)->update([
                'name' => $request->name_M,
                'img' => $save_url,
                'price' => $request->prix_M,
                'description' => $request->Description_M,
                'categorie' => $request->categorie_M,
                'created_at' => Carbon::now()
            ]);
            return redirect()->back();
        }else {
            Produits::findOrFail($id)->update([
                'name' => $request->name_M,
                'price' => $request->prix_M,
                'description' => $request->Description_M,
                'categorie' => $request->categorie_M,
                'created_at' => Carbon::now()
            ]);
            return redirect()->back();
        }
    }
}
