<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesProducts extends Model
{
    use HasFactory;

    /**
     * Lista de productos según el tipo de producto
     *
     * @return collections
     */
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'type_product_id');
    }
}
