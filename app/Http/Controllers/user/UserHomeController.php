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

class UserHomeController extends Controller
{
    public function index()
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
            ->get();
        $best_pro = DB::table('Commandes as c')
            ->join('produits as p', 'c.id_produit', '=', 'p.id')
            ->select('p.name as name', 'p.img as img', 'p.price as price', DB::raw('COUNT(c.id) as total'))
            ->groupBy('p.name', 'p.img', 'p.price')
            ->orderBy(DB::raw('COUNT(c.id)'), 'desc')
            ->get();
        return view('user/userHome', compact(
            'pros',
            'best_pro',
            'cats',
            'bijoux',
            'hommes',
            'femmes',
            'romantique',
            'anniversaire',
            'villes'
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
    public function rech(Request $request)
    {
        if($request->ajax()) {
            $data = Produits::where('name', 'like', '%' .$request->rechercher .'%')->get();
            $output = '';
            if(count($data) > 0) {
                foreach($data as $row) {
                    $output .= "
                        <li><a href='#'>".$row->name."</a></li>
                    ";
                }
            }else {
                $output .= 'non resultat';
            }

        }
        return $output;
    }
}
