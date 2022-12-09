<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index()
    {
        $cmds = DB::table('commandes as c')
            ->join('produits as p', 'c.id_produit', '=', 'p.id')
            ->join('villes as v', 'c.id_ville', '=', 'v.id')
            ->select('c.*', 'p.*', 'v.name as ville', 'c.id as cmdid')
            ->orderBy('c.id', 'desc')
            ->get();
        $cmd_V = DB::table('commandes')
            ->where('status', 'valider')
            ->get();
        $cmd_En = DB::table('commandes')
            ->where('status', 'en cours')
            ->get();
        $cmd_R = DB::table('commandes')
            ->where('status', 'refus')
            ->get();
        return view('admin/commande', compact('cmds', 'cmd_V', 'cmd_En','cmd_R'));
    }
    public function valider($id)
    {
        Commande::findOrFail($id)->update([
            'status' => 'valider'
        ]);
        return redirect()->back();
    }
    public function refuser($id)
    {
        Commande::findOrFail($id)->update([
            'status' => 'refus'
        ]);
        return redirect()->back();
    }
}
