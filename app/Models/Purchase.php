<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'raw_date',
        'raw_contract_no',
        'raw_buyer_name',
        'raw_seller_name',
        'raw_commodity',
        'raw_specification',
        'raw_price',
        'raw_packing',
        'raw_delivery',
        'raw_quantity',
        'raw_bags_condition',
        'raw_payment_terms',
        'raw_terms_conditions',
          'status',
    ];
       public function buyer()
    {
        return $this->belongsTo(Admin::class, 'raw_buyer_name'); 
    }

    // Seller relationship
    public function seller()
    {
        return $this->belongsTo(Admin::class, 'raw_seller_name'); 
    }
}
    
 


