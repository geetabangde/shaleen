<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'name',
        'allow_edit',
        'allow_delete',
        'allow_show',
    ];

    /**
     * Get all records for this module
     */
    public function records()
    {
        return $this->hasMany(ModuleRecord::class);
    }

    /**
     * Get all fields for this module
     */
    public function fields()
    {
        return $this->hasMany(ModuleField::class);
    }

    /**
     * Get all files uploaded for this module
     */
    public function files()
    {
        return $this->hasMany(ModuleFile::class);
    }
}
