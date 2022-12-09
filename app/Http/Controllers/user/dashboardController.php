<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Produits;
use App\Models\Villes;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    // public function index()
    // {
    //     $pros = Produits::all();
    //     $villes = Villes::all();
    //     return view('User.userHome', compact('pros', 'villes'));
    // }
    // public function store(Request $request)
    // {
    //     Commande::insert([
    //         'nom' => $request->nom,
    //         'prenom' => $request->prenom,
    //         'tel' => $request->tel,
    //         'id_produit' => $request->produit,
    //         'id_ville' => $request->ville,
    //         'date' => $request->date,
    //         'time' => $request->time,
    //         'qty' => $request->qty,
    //         'address' => $request->address,
    //         'detais' => $request->detais,
    //         'created_at' => Carbon::now()
    //     ]);
    //     return redirect()->back();
    // }
}
