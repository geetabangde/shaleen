<?php

// app/Models/SaleContract.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_no', 
        'contract_date',
        'seller_name', 
        'seller_address', 
        'seller_phone',
        'buyer_name', 
        'buyer_address',
        'buyer_nif', 
        'broker_name',
        'commodity',
        'packing', 
        'shipment_date', 
        'price', 
        'quantity', 
        'total_value', 
        'payment_terms', 
        'documents', 
        'document_names',
        'seller_bank_details', 
        'terms_conditions'
    ];

     public function buyer()
    {
        return $this->belongsTo(Admin::class, 'buyer_name'); 
    }

    // Seller relationship
    public function seller()
    {
        return $this->belongsTo(Admin::class, 'seller_name'); 
    }
}
