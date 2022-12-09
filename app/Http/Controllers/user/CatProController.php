<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Produits;
use App\Models\Villes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatProController extends Controller
{
    public function index($name)
    {
        $cats = Categories::all();
        $bijoux = Produits::where('categorie', 'bijoux')->paginate(6);
        $hommes = Produits::where('categorie', 'hommes')->paginate(6);
        $femmes = Produits::where('categorie', 'femmes')->paginate(6);
        $romantique = Produits::where('categorie', 'romantique')->paginate(6);
        $anniversaire = Produits::where('categorie', 'anniversaire')->paginate(6);
        $villes = Villes::all();
        $pros = DB::table('Produits')
            ->orderBy('id', 'desc')
            ->where('categorie', $name)
            ->get();
        $pros_name = DB::table('Produits')
            ->orderBy('id', 'desc')
            ->distinct()
            ->select('categorie')
            ->where('categorie', $name)
            ->get();
        return view('user/userCatPro', compact(
            'cats',
            'bijoux',
            'hommes',
            'femmes',
            'romantique',
            'anniversaire',
            'pros',
            'pros_name',
            'villes'
        ));
    }
}
