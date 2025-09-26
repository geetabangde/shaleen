<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\ModuleField;

class ModuleController extends Controller
{
    // 1️⃣ List all modules
    public function index(Module $module)
    {
        
        $records = $module->records()->latest()->get(); 
        $module->load('fields'); 
        return view('admin.modules.index', compact('module', 'records'));
    }
    // 3️⃣ Store new module
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:modules,name',
            'allow_edit' => 'nullable|boolean',
            'allow_delete' => 'nullable|boolean',
            'fields.*.label' => 'required|string',
            'fields.*.type' => 'required|in:text,number,date,file,radio,checkbox,dropdown',
            'fields.*.attributes.required' => 'nullable|boolean',
            'fields.*.attributes.maxlength' => 'nullable|integer',
            'fields.*.attributes.placeholder' => 'nullable|string',
            'fields.*.attributes.default' => 'nullable|string',
            'fields.*.options' => 'nullable|array',
            'fields.*.dynamic_module_id' => 'nullable|exists:modules,id',
        ]);

        $module = Module::create([
            'name' => $request->name,
            'allow_edit' => $request->allow_edit ?? 0,
            'allow_delete' => $request->allow_delete ?? 0,
        ]);

        foreach ($request->fields ?? [] as $field) {
            $options = $field['type'] === 'dropdown' && !empty($field['dynamic_module_id'])
                ? ['dynamic_module_id' => $field['dynamic_module_id']]
                : ($field['options'] ?? []);

            ModuleField::create([
                'module_id' => $module->id,
                'label' => $field['label'],
                'type' => $field['type'],
                'attributes' => array_filter($field['attributes'] ?? []),
                'options' => $options,
            ]);
        }

        return redirect()->route('index')->with('success', 'Module created successfully.');
    }

    // 4️⃣ Show edit form
    public function edit(Module $module)
    {
        $module->load('fields');
        return view('edit', compact('module'));
    }

    // 5️⃣ Update module
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|unique:modules,name,'.$module->id,
            'allow_edit' => 'nullable|boolean',
            'allow_delete' => 'nullable|boolean',
            'fields.*.label' => 'required|string',
            'fields.*.type' => 'required|in:text,number,date,file,radio,checkbox,dropdown',
            'fields.*.attributes.required' => 'nullable|boolean',
            'fields.*.attributes.maxlength' => 'nullable|integer',
            'fields.*.attributes.placeholder' => 'nullable|string',
            'fields.*.attributes.default' => 'nullable|string',
            'fields.*.options' => 'nullable|array',
            'fields.*.dynamic_module_id' => 'nullable|exists:modules,id',
        ]);

        $module->update([
            'name' => $request->name,
            'allow_edit' => $request->allow_edit ?? 0,
            'allow_delete' => $request->allow_delete ?? 0,
        ]);

        // Update fields
        foreach ($request->fields ?? [] as $fieldData) {
            if (!empty($fieldData['id'])) {
                $field = ModuleField::find($fieldData['id']);
                $field->update([
                    'label' => $fieldData['label'],
                    'type' => $fieldData['type'],
                    'attributes' => $fieldData['attributes'] ?? [],
                    'options' => $fieldData['options'] ?? [],
                ]);
            } else {
                // New field
                ModuleField::create([
                    'module_id' => $module->id,
                    'label' => $fieldData['label'],
                    'type' => $fieldData['type'],
                    'attributes' => $fieldData['attributes'] ?? [],
                    'options' => $fieldData['options'] ?? [],
                ]);
            }
        }

        return redirect()->route('index')->with('success', 'Module updated successfully.');
    }
    
    public function destroy(Module $module)
    {
        if ($module->allow_delete) {
            $module->delete();
            return redirect()->route('index')->with('success', 'Module deleted successfully.');
        }
        return redirect()->route('index')->with('error', 'This module cannot be deleted.');
    }
}
