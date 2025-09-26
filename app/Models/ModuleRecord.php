<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'data', // JSON data
    ];

    protected $casts = [
        'data' => 'array', // Automatically cast JSON to array
    ];

    /**
     * Belongs to a module
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get all files attached to this record
     */
    public function files()
    {
        return $this->hasMany(ModuleFile::class);
    }
}
