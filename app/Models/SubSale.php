<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSale extends Model
{
    protected $fillable = ['sale_id', 'quantity', 'sale_price'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
