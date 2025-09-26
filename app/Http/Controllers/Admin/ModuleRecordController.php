<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\ModuleRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
  
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ModuleRecordController extends Controller
{
    
    public function index(Module $module)
    {
        // Dynamic table name
        $tableName = Str::plural(Str::snake($module->name)); // Vehicle -> vehicles

        // Check if table exists
        if (Schema::hasTable($tableName)) {
            $records = DB::table($tableName)->get();
        } else {
            $records = collect(); // Empty collection agar table nahi hai
        }

        return view('admin.modules.index', compact('module', 'records'));
    }
    // Show form to create new record
    public function create(Module $module)
    {
        return view('admin.modules.create', compact('module'));
    }

    public function store(Request $request, Module $module)
    {
        $data = [];

        foreach ($module->fields as $field) {
            $value = null;

            if ($field->type === 'file' && $request->hasFile("fields.{$field->id}")) {
                $file = $request->file("fields.{$field->id}");
                $value = $file->store('uploads/module_files', 'public');
            } else {
                $value = $request->input("fields.{$field->id}");

            
                if (is_array($value)) {
                    $value = json_encode($value);
                }
            }

            $data[$field->id] = $value;
        }

    
        $tableName = Str::plural(Str::snake($module->name)); 
        $columns = [];
        foreach ($module->fields as $field) {
            $columnName = Str::snake($field->label);
            $columns[$columnName] = $data[$field->id] ?? null;
        }

        DB::table($tableName)->insert($columns);

        return redirect()->route('admin.modules.records.index', $module->id)
                        ->with('success', 'Record created successfully.');
    }
    // Show form to edit a record
    public function edit(Module $module, $recordId)
    {
        $tableName = Str::snake($module->name).'s'; // e.g., Vehicle -> vehicles
        $record = DB::table($tableName)->where('id', $recordId)->first(); // get single record

        if (!$record) {
            abort(404);
        }

        return view('admin.modules.edit', compact('module', 'record'));
    }
    public function update(Request $request, Module $module, $recordId)
    {
        // Dynamic table name
        $tableName = Str::snake($module->name).'s'; // Vehicle -> vehicles

        // Get existing record from table
        $record = DB::table($tableName)->where('id', $recordId)->first();
        if (!$record) {
            abort(404);
        }

        $updateData = [];

        foreach ($module->fields as $field) {
            $columnName =Str::snake($field->label);

            // File handling
            if ($field->type === 'file' && $request->hasFile("fields.{$field->id}")) {
                $file = $request->file("fields.{$field->id}");
                $path = $file->store('uploads/module_files', 'public');

                // Delete old file if exists
                if (!empty($record->$columnName) && Storage::disk('public')->exists($record->$columnName)) {
                    Storage::disk('public')->delete($record->$columnName);
                }

                $updateData[$columnName] = $path;
            }
            // Checkbox fields (multiple values)
            elseif ($field->type === 'checkbox') {
                $updateData[$columnName] = json_encode($request->input("fields.{$field->id}", []));
            }
            // Other fields
            else {
                $updateData[$columnName] = $request->input("fields.{$field->id}", null);
            }
        }

        // Update dynamic table
        DB::table($tableName)->where('id', $recordId)->update($updateData);

        return redirect()->route('admin.modules.records.index', $module->id)
                        ->with('success', $module->name.' record updated successfully.');
    }

    // show_source

    public function view(Module $module, $recordId)
    {
        $tableName = Str::snake($module->name).'s'; // e.g., Vehicle -> vehicles
        $record = DB::table($tableName)->where('id', $recordId)->first(); // get single record

        if (!$record) {
            abort(404);
        }

        return view('admin.modules.view', compact('module', 'record'));
    }

    public function destroy(Module $module, $recordId)
    {
        // Dynamic table name
        $tableName = Str::snake($module->name).'s'; // Vehicle -> vehicles

        // Get record from table
        $record = DB::table($tableName)->where('id', $recordId)->first();
        if (!$record) {
            abort(404);
        }

        // Delete file fields
        foreach ($module->fields as $field) {
            $columnName =Str::snake($field->label);

            if ($field->type === 'file' && !empty($record->$columnName)) {
                if (Storage::disk('public')->exists($record->$columnName)) {
                    Storage::disk('public')->delete($record->$columnName);
                }
            }
        }
        DB::table($tableName)->where('id', $recordId)->delete();

        return redirect()->route('admin.modules.records.index', $module->id)
                        ->with('success', $module->name.' record deleted successfully.');
    }

}