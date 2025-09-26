<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\ModuleField;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class DynamicModulesController extends Controller
{
    public function index()
    {
        $modules = Module::withCount('fields')->get();
        return view('admin.dynamicModules.index', compact('modules'));
    }
    public function create()
    {
        $modules = Module::all(); 
        return view('admin.dynamicModules.create', compact('modules'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:modules',
            'allow_edit' => 'nullable|boolean',
            'allow_delete' => 'nullable|boolean',
            'allow_show' => 'nullable|boolean',
            'fields.*.label' => 'required|string',
            'fields.*.type' => 'required|in:text,number,date,file,radio,checkbox,dropdown,email,password',
            'fields.*.attributes.required' => 'nullable|boolean',
            'fields.*.attributes.maxlength' => 'nullable|integer',
            'fields.*.attributes.placeholder' => 'nullable|string',
            'fields.*.attributes.default' => 'nullable|string',
            'fields.*.options' => 'nullable|array',
            'fields.*.dynamic_module_id' => 'nullable|exists:modules,id',
            'fields.*.options_type' => 'nullable|in:static,dynamic',
            'fields.*.table_show' => 'nullable|boolean', // <-- new
        ]);

        $module = Module::create([
            'name' => $request->name,
            'allow_edit' => $request->allow_edit ?? 0,
            'allow_delete' => $request->allow_delete ?? 0,
            'allow_show' => $request->allow_show ?? 0,
        ]);

    
        $columns = []; 
        foreach ($request->fields ?? [] as $field) {
        $options = [];

        
            if ($field['type'] === 'dropdown') {
            if (!empty($field['dynamic_module_id'])) {
                // Force storing only ["<id>"] even for dynamic options
                $options = [strval($field['dynamic_module_id'])]; 
            } elseif (!empty($field['options']) && is_array($field['options'])) {
                $options = array_filter($field['options'], fn($opt) => $opt !== null && $opt !== '');
            }
        } elseif (in_array($field['type'], ['checkbox', 'radio']) && !empty($field['options'])) {
            $options = array_filter($field['options'], fn($opt) => $opt !== null && $opt !== '');
        }

        ModuleField::create([
            'module_id'     => $module->id,
            'label'         => $field['label'],
            'type'          => $field['type'],
            'options'       => $options,
            'required'      => !empty($field['attributes']['required']) ? 1 : 0,
            'placeholder'   => $field['attributes']['placeholder'] ?? null,
            'default_value' => $field['attributes']['default'] ?? null,
            'max_length'    => $field['attributes']['maxlength'] ?? null,
            'value_type'    => ($field['type'] === 'dropdown') ? ($field['options_type'] ?? 'static') : null, 
            'table_show'    => !empty($field['table_show']) ? 1 : 0, // <-- new
            
        ]);
        switch ($field['type']) {
                case 'text':
                case 'email':
                case 'password':
                case 'dropdown':
                case 'radio':
                case 'checkbox':
                    $columns[$field['label']] = 'string';
                    break;
                case 'number':
                    $columns[$field['label']] = 'integer';
                    break;
                case 'date':
                    $columns[$field['label']] = 'date';
                    break;
                case 'file':
                    $columns[$field['label']] = 'string';
                    break;
                default:
                    $columns[$field['label']] = 'string';
            }
    }

        $tableName = \Str::plural(\Str::snake($request->name)); 
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) use ($columns) {
                $table->id();
                foreach ($columns as $name => $type) {
                    $table->string(\Str::snake($name))->nullable(); 
                }
                $table->timestamps();
            });
        }

        return redirect()->route('admin.dynamicmodules.index')->with('success', 'Module created successfully.');
    }
    public function edit(Module $module)
    {
        $modules = Module::all(); 
        return view('admin.dynamicModules.edit', compact('module', 'modules'));
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|unique:modules,name,' . $module->id,
            'allow_edit' => 'nullable|boolean',
            'allow_delete' => 'nullable|boolean',
            'allow_show' => 'nullable|boolean',
            'fields.*.label' => 'required|string',
            'fields.*.type' => 'required|in:text,number,date,file,radio,checkbox,dropdown,email,password',
            'fields.*.attributes.required' => 'nullable|boolean',
            'fields.*.attributes.maxlength' => 'nullable|integer',
            'fields.*.attributes.placeholder' => 'nullable|string',
            'fields.*.attributes.default' => 'nullable|string',
            'fields.*.options' => 'nullable|array',
            'fields.*.dynamic_module_id' => 'nullable|exists:modules,id',
            'fields.*.old_label' => 'nullable|string',
            'fields.*.options_type' => 'nullable|in:static,dynamic',
            'fields.*.table_show' => 'nullable|boolean', // <-- add this
        ]);

        $oldTableName = Str::snake($module->name).'s';
        $newTableName = Str::snake($request->name).'s';

        // Rename table if module name changed
        if ($oldTableName !== $newTableName && Schema::hasTable($oldTableName)) {
            Schema::rename($oldTableName, $newTableName);
        }

        // Update Module info
        $module->update([
            'name' => $request->name,
            'allow_edit' => $request->allow_edit ?? 0,
            'allow_delete' => $request->allow_delete ?? 0,
            'allow_show' => $request->allow_show ?? 0,
        ]);

        // Get old fields before deleting
        $oldFields = $module->fields()->pluck('label','id')->toArray(); // id => label

        // Delete old fields
        $module->fields()->delete();

        $newColumnNames = [];

        foreach ($request->fields ?? [] as $field) {
            $options = [];
            // if ($field['type'] === 'dropdown' && !empty($field['dynamic_module_id'])) {
            //     $options = ['dynamic_module_id' => $field['dynamic_module_id']];
            // } elseif (!empty($field['options'])) {
            //     $options = $field['options'];
            // }
        if ($field['type'] === 'dropdown') {
        if (!empty($field['dynamic_module_id'])) {
            // Force storing only ["<id>"] even for dynamic options
            $options = [strval($field['dynamic_module_id'])]; 
        } elseif (!empty($field['options']) && is_array($field['options'])) {
            $options = array_filter($field['options'], fn($opt) => $opt !== null && $opt !== '');
        }
    } elseif (in_array($field['type'], ['checkbox', 'radio']) && !empty($field['options'])) {
        $options = array_filter($field['options'], fn($opt) => $opt !== null && $opt !== '');
    }

            $newField = ModuleField::create([
                'module_id'     => $module->id,
                'label'         => $field['label'],
                'type'          => $field['type'],
                'options'       => $options,
                'required'      => !empty($field['attributes']['required']) ? 1 : 0,
                'placeholder'   => $field['attributes']['placeholder'] ?? null,
                'default_value' => $field['attributes']['default'] ?? null,
                'max_length'    => $field['attributes']['maxlength'] ?? null,
                'value_type'    => ($field['type'] === 'dropdown') ? ($field['options_type'] ?? 'static') : null, 
                'table_show'    => !empty($field['table_show']) ? 1 : 0, // <-- add this
            ]);

            $newColumn = Str::snake($field['label']);
            $newColumnNames[] = $newColumn;
            $oldColumn = Str::snake($field['old_label'] ?? '');

            try {
                // Rename old column if exists
                if ($oldColumn && $oldColumn !== $newColumn && Schema::hasColumn($newTableName, $oldColumn)) {
                    Schema::table($newTableName, function (Blueprint $table) use ($oldColumn, $newColumn) {
                        $table->renameColumn($oldColumn, $newColumn);
                    });
                }

                // Add new column if not exists
                if (!Schema::hasColumn($newTableName, $newColumn)) {
                    Schema::table($newTableName, function (Blueprint $table) use ($newColumn, $field) {
                        switch($field['type']) {
                            case 'text':
                            case 'email':
                            case 'password':
                                $table->string($newColumn)->nullable();
                                break;
                            case 'number':
                                $table->integer($newColumn)->nullable();
                                break;
                            case 'date':
                                $table->date($newColumn)->nullable();
                                break;
                            case 'file':
                                $table->string($newColumn)->nullable();
                                break;
                            case 'checkbox':
                            case 'radio':
                            case 'dropdown':
                            default:
                                $table->text($newColumn)->nullable();
                        }
                    });
                }
            } catch (\Exception $e) {
                // Handle migration errors silently
                \Log::error("Module update column error: ".$e->getMessage());
            }
        }

        // Remove columns removed from module
        foreach ($oldFields as $oldLabel) {
            $oldColumn = Str::snake($oldLabel);
            if (!in_array($oldColumn, $newColumnNames) && Schema::hasColumn($newTableName, $oldColumn)) {
                try {
                    Schema::table($newTableName, function (Blueprint $table) use ($oldColumn) {
                        $table->dropColumn($oldColumn);
                    });
                } catch (\Exception $e) {
                    \Log::error("Module drop column error: ".$e->getMessage());
                }
            }
        }

        return redirect()->route('admin.dynamicmodules.index')
        ->with('success','Module and table updated successfully.');
    }

    public function destroy(Module $module)
    {
        try {

            $tableName = Str::snake($module->name) . 's';
            $module->fields()->delete();
            if (Schema::hasTable($tableName)) {
                Schema::dropIfExists($tableName);
            }
            $module->delete();
            return redirect()->route('admin.dynamicmodules.index')
                            ->with('success', 'Module and its table deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.dynamicmodules.index')
            ->with('error', 'Failed to delete module: ' . $e->getMessage());
        }
    }

}