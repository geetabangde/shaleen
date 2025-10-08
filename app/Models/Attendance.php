<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Table name (optional if follows Laravel convention)
    protected $table = 'attendances';

    // Allow all columns to be mass assignable
    protected $guarded = [];

    // Casts for proper data types
    protected $casts = [
        'attendance_date' => 'date',
        'day_shift_worked' => 'boolean',
        'night_shift_worked' => 'boolean',
        'day_rate' => 'decimal:2',
        'night_rate' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    // Relationship to Labour
    // public function labour()
    // {
    //     return $this->belongsTo(Labour::class, 'labour_id');
    // }
}
