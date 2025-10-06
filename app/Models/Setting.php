<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    
    protected $table = 'settings';

    // Mass assignable fields
    protected $fillable = [
        'key',
        'value',
    ];
    // Timestamps enabled by default
    public $timestamps = true;
}
