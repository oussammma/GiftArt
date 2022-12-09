<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetaisCommandeController extends Controller
{
    public function index($id) 
    {
        $cmds = DB::table('commandes as c')
        ->join('produits as p', 'c.id_produit', '=', 'p.id')
        ->join('villes as v', 'c.id_ville', '=', 'v.id')
        ->select('c.*', 'p.*', 'v.name as ville', 'c.id as cmdid')
        ->orderBy('c.id', 'desc')
        ->where('c.id', $id)
        ->get();
        return view('admin/detaisCommande', compact('cmds'));
    }
}
