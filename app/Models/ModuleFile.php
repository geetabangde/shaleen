<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'module_record_id',
        'field_id',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
    ];

    /**
     * Belongs to a module
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Belongs to a module record
     */
    public function record()
    {
        return $this->belongsTo(ModuleRecord::class, 'module_record_id');
    }

    /**
     * Belongs to a module field (optional)
     */
    public function field()
    {
        return $this->belongsTo(ModuleField::class, 'field_id');
    }
}
