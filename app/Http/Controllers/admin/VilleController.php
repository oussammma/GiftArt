<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Villes;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\HorizontalBar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VilleController extends Controller
{
    public function index(Request $request)
    {
        $ville_cmd = DB::table('commandes as c')
            ->join('villes', 'villes.id', '=', 'c.id_ville')
            ->select('villes.name as name', DB::raw('COUNT(c.id) as total'))
            ->groupBy('villes.name')
            ->orderBy('total', 'desc')
            ->paginate(5);
        $villeName = [];
        $villeCount = [];
        foreach ($ville_cmd as $ville) {
            $villeName[] = $ville->name;
            $villeCount[] = $ville->total;
        }
        $chart1 = (new HorizontalBar)
            ->setTitle('Top 5 ville')
            ->addData('Count Commande', $villeCount)
            ->setXAxis($villeName)
            ->setHeight('200')
            ->setColors(['#F8B400']);

        $villes = Villes::orderBy('id', 'desc')->get();
        return view('Admin/ville', compact('villes', 'chart1'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories|min:3|max:40'
        ]);
        Villes::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        Villes::find($id)->delete();
        return redirect()->back();
    }
    public function update(Request $request)
    {
        $id = $request->id;
        Villes::findOrFail($id)->update([
            'name' => $request->name_update,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
