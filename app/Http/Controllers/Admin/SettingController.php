<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Show all settings
    public function index()
    {
        $settings = Setting::latest()->get();
        return view('admin.settings.index', compact('settings'));
    }

    // Show create form
    public function create()
    {
        return view('admin.settings.create');
    }

    // Store new setting
    public function store(Request $request)
    {
        $request->validate([
            'key'   => 'required|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
        ]);

        Setting::create([
            'key'   => $request->key,
            'value' => $request->value,
        ]);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    // Update setting
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'key'   => 'required|string|max:255|unique:settings,key,' . $id,
            'value' => 'nullable|string',
        ]);

        $setting->update([
            'key'   => $request->key,
            'value' => $request->value,
        ]);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully!');
    }

    // Delete setting
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully!');
    }
}
