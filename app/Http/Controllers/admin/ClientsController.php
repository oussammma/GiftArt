<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        $clts = DB::table('commandes as c')
            ->select('nom','prenom',DB::raw('COUNT(c.id) as total'))
            ->groupBy('nom','prenom')
            ->orderBy(DB::raw('COUNT(c.id)'), 'desc')
            ->get();
        return view('admin/clients', compact('clts'));
    }
}
