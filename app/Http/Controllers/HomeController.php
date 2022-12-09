<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Commande;
use App\Models\Produits;
use ArielMejiaDev\LarapexCharts\AreaChart;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use ArielMejiaDev\LarapexCharts\LarapexChart as LarapexChartsLarapexChart;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\PieChart;
use ArielMejiaDev\LarapexCharts\PolarAreaChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cmd = Commande::all();
        $cmds = DB::table('commandes as c')
            ->join('produits as p', 'c.id_produit', '=', 'p.id')
            ->join('villes as v', 'c.id_ville', '=', 'v.id')
            ->select('c.*', 'p.*', 'v.name as ville', 'c.id as cmdid')
            ->orderBy('c.id', 'desc')
            ->get();
        $new_cmd = DB::table('commandes')
            ->join('produits', 'commandes.id_produit', '=', 'produits.id')
            ->orderBy('commandes.id', 'desc')
            ->where('status', 'en cours')
            ->select('produits.*', 'commandes.*', 'commandes.id as cmdid')
            ->paginate(6);
        $revenu = DB::table('commandes')
            ->join('produits', 'commandes.id_produit', '=', 'produits.id')
            ->selectRaw('SUM(commandes.qty * produits.price) as prix')
            ->get();
        $total_Client = DB::table('commandes')
            ->select('nom', 'prenom')
            ->distinct()
            ->get()
            ->count();

        $best_Pro = DB::table('commandes')
            ->join('produits', 'commandes.id_produit', '=', 'produits.id')
            ->select(DB::raw('COUNT(commandes.id_produit) as pro'), 'produits.name')
            ->groupBy('commandes.id_produit', 'produits.name')
            ->get();
        $best_Pro_Name = [];
        $best_Pro_Count = [];
        foreach ($best_Pro as $best) {
            $best_Pro_Name[] = $best->name;
            $best_Pro_Count[] = $best->pro;
        }

        $chart = (new PieChart)
            ->setTitle('Top produits')
            ->addData($best_Pro_Count)
            ->setHeight('300')
            ->setColors(['#ffc63b', '#FF5D5D', '#371B58', '#00FFAB', '#0057ff', '#00a9f4', '#2ccdc9', '#5e72e4'])
            ->setLabels($best_Pro_Name);



        $cmd_D = Commande::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('D');
        });
        $months = [];
        $monthCount = [];
        foreach ($cmd_D as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }
        $chart1 = (new BarChart)
            ->setTitle('Commandes par jour')
            ->addData('Count Commande', $monthCount)
            ->setXAxis($months)
            ->setHeight('300')
            ->setColors(['#646FD4']);

        $cmd_R = Commande::select('id', 'created_at')->where('status', 'refus')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('D');
        });
        $months_R = [];
        $monthCount_R = [];
        foreach ($cmd_R as $month => $values) {
            $months_R[] = $month;
            $monthCount_R[] = count($values);
        }
        $chart2 = (new AreaChart)
            ->setTitle('Commandes refuser par jour')
            ->addData('refuser', $monthCount_R)
            ->setXAxis($months_R)
            ->setHeight('300')
            ->setColors(['#B20600']);

        $cmd_V = Commande::select('id', 'created_at')->where('status', 'valider')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('D');
        });
        $months_V = [];
        $monthCount_V = [];
        foreach ($cmd_V as $month => $values) {
            $months_V[] = $month;
            $monthCount_V[] = count($values);
        }
        $chart3 = (new AreaChart)
            ->setTitle('Commandes valider par jour')
            ->addData('valider', $monthCount_V)
            ->setXAxis($months_V)
            ->setHeight('300')
            ->setColors(['#4E9F3D']);

        return view('admin/home', compact(
            'chart',
            'chart1',
            'chart2',
            'chart3',
            'months',
            'monthCount',
            'revenu',
            'cmd',
            'best_Pro',
            'total_Client',
            'new_cmd',
            'cmds'
        ));
    }
}
