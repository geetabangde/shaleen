<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSale extends Model
{
    protected $fillable = [
    'sale_id', 
    'quantity', 
    'sale_price',
    'unit',
    'mode_terms_of_payment',
    'dispatch_doc_no',
    'delivery_note_date',
    'dispatched_through',
    'motor_vehicle_no',
    'terms_of_delivery',
    'delivery_note',
    'reference_no',
    'other_references',
    'buyer_order_no',
    'dated',
    'destination',
    'bill_lr_no',
    'invoice_no', 
    'invoice_date',
    'status',
    'delivery_type',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
