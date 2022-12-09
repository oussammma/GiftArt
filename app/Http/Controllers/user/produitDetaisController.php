<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Commande;
use App\Models\Produits;
use App\Models\Villes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class produitDetaisController extends Controller
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
        $pros_dts = DB::table('Produits')
            ->where('name', $name)
            ->get();
        return view('user/produits_detais', compact(
            'pros_dts',
            'villes',
            'cats',
            'bijoux',
            'hommes',
            'femmes',
            'romantique',
            'anniversaire'
        ));
    }
    public function store(Request $request)
    {
        Commande::insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'id_produit' => $request->id,
            'id_ville' => $request->ville,
            'tel' => $request->tel,
            'date' => $request->date,
            'time' => $request->time,
            'qty' => $request->qty,
            'address' => $request->address,
            'detais' => $request->detais,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back();
    }
}
