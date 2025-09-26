<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleField extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'label',
        'type',
        'options',
        'required',
        'placeholder',
        'default_value',
        'max_length',
        'value_type',
        'dynamic_module_id',
        'table_show',
    ];

    protected $casts = [
        'options' => 'array', 
        'required' => 'boolean',
    ];

    /**
     * Belongs to a module
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get all files associated with this field
     */
    public function files()
    {
        return $this->hasMany(ModuleFile::class, 'field_id');
    }
}
