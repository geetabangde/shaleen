<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $table = 'bags'; 

    protected $fillable = [
        'date',
        'contract_no',
        'buyer_name',
        'seller_name',
        'packing',
        'number_of_container',
        'marking',
        'price',
        'quantity',
        'broker',
        'delivery_at',
        'remark',
        'number_of', 
        'status',    
       
    ];
     public function buyer()
    {
        return $this->belongsTo(Admin::class, 'buyer_name'); 
    }
   
      public function seller()
    {
        return $this->belongsTo(Admin::class, 'seller_name'); 
    }
    
}