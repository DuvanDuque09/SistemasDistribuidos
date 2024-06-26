<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function typesProducts()
    {
        return $this->belongsTo('App\Models\TypesProducts');
    }
}
