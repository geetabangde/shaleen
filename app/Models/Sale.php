<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Table name (optional, Laravel automatically uses 'sales' for 'Sale' model)
    protected $table = 'sales';

    // Mass assignable fields
    protected $fillable = [
        'date',
        'sales_order_id',
        'broker_name',
        'party_name',
        'item_id',
        'quantity',
        'bags',
        'brand',
        'price',
        'remark',
        'loading_history_pending_balance',
    ];

    // If you want, you can also cast some fields
    protected $casts = [
        'date' => 'date',
        'quantity' => 'decimal:2',
        'price' => 'decimal:2',
    ];
     public function partyname()
    {
        return $this->belongsTo(Admin::class, 'party_name'); 
    }
   
      public function broker()
    {
        return $this->belongsTo(Admin::class, 'broker_name'); 
    }
     public function beg()
    {
        return $this->belongsTo(Bag::class, 'seller_name'); 
    }

     public function subSales()
    {
        return $this->hasMany(SubSale::class);
    }

    public function itemMaster()
    {
        return $this->belongsTo(ItemMaster::class, 'item_id');
    }



    
    
}