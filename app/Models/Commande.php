<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produit()
    {
        return $this->belongsTo(Produits::class);
    }
    public function ville()
    {
        return $this->belongsTo(Villes::class);
    }
}
