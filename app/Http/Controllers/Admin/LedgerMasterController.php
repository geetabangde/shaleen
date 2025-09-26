<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;



class LedgerMasterController extends Controller
{
    public function index()
    {
        $ledgerMaster = Admin::where('status', 1)->latest() ->get();
        return view('admin.ledgerMaster.index', compact('ledgerMaster'));
    }
   public function create()
   {
      return view('admin.ledgerMaster.create');
   }
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:admins,email',
           'password'           => 'required|string|min:6|confirmed',
           'password_confirmation' => 'required|string|min:6',
            'contact_number'  => 'required|string|max:15',
            'pan_number'      => 'nullable|string|max:20',
            'tan_number'      => 'nullable|string|max:20',
             'types' => 'required|array',
            'types.*' => 'in:seller,buyer,broker',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:30',
            'account_type'  => 'nullable|string|max:30',
            'ifsc_code'       => 'nullable|string|max:15',
            'address.*.pincode'   => 'required|string|max:10',
            'address.*.consignment_address'   => 'required',
            'address.*.state'     => 'required|string|max:100',
            'address.*.country'   => 'required|string|max:100',
        ]);
        $imagePath = null;
            if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            }$imagePath = null;
            if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            }

        $admin = new Admin();
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->password =$validated['password'];
        $admin->contact_number = $validated['contact_number'];
        $admin->pan_number = $validated['pan_number'] ?? null;
        $admin->tan_number = $validated['tan_number'] ?? null;
        $admin->bank_name = $validated['bank_name'] ?? null;
        $admin->account_number = $validated['account_number'] ?? null;
        $admin->account_type = $validated['account_type'] ?? null;
        $admin->ifsc_code = $validated['ifsc_code'] ?? null;
        $admin->address = json_encode($validated['address']?? []);
        $admin->types = json_encode($validated['types'] ?? []);
        $admin->image = $imagePath; 
        $admin->save();

        return redirect()->route('admin.ledgerMaster.index')->with('success', 'Vendor Create successfully!');
    }
    public function edit($id)
    {
        $ledgerMaster = Admin::findOrFail($id);
        $ledgerMaster->types = $ledgerMaster->types ? json_decode($ledgerMaster->types, true) : [];
        return view('admin.ledgerMaster.edit', compact('ledgerMaster'));
    }
    public function update(Request $request, $id)
    {

         $request->validate([
            'name'            => 'required',
            'email'           => 'required|email',
           'password'           => 'required|string|min:6|confirmed',
           'password_confirmation' => 'required|string|min:6',
            'contact_number'  => 'required|string|max:15',
            'pan_number'      => 'nullable|string|max:20',
            'tan_number'      => 'nullable|string|max:20',
             'types' => 'nullable|array',
             'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'types.*' => 'in:seller,buyer,broker',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:30',
            'account_type'  => 'nullable|string|max:30',
            'ifsc_code'       => 'nullable|string|max:15',
            'address.*.pincode'   => 'required|string|max:10',
            'address.*.consignment_address'   => 'required',
            'address.*.state'     => 'required|string|max:100',
            'address.*.country'   => 'required|string|max:100',
        ]);
        $ledgerMaster = Admin::findOrFail($id);
           if ($request->hasFile('image')) {
      
        if ($ledgerMaster->image && file_exists(storage_path('app/public/' . $ledgerMaster->image))) {
            unlink(storage_path('app/public/' . $ledgerMaster->image));
        }

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('ledger_images', $fileName, 'public');
        $ledgerMaster->image = $filePath;
    }
        $ledgerMaster->name           = $request->name;
        $ledgerMaster->email          = $request->email;
        if ($request->filled('password')) {
            $ledgerMaster->password   =$request->password;
        }
        $ledgerMaster->contact_number = $request->contact_number;
        $ledgerMaster->pan_number     = $request->pan_number;
        $ledgerMaster->tan_number     = $request->tan_number;
        $ledgerMaster->bank_name      = $request->bank_name;
        $ledgerMaster->account_number = $request->account_number;
        $ledgerMaster->account_type   = $request->account_type;
        $ledgerMaster->ifsc_code      = $request->ifsc_code;
        $ledgerMaster->address        = $request->address; 
        $ledgerMaster->types        = $request->types; 

        $ledgerMaster->save();
        if($ledgerMaster){
           return redirect()->route('admin.ledgerMaster.index')->with('success', 'Vendor updated successfully!');
        }
    }
    public function destroy($id)
    {
        try {
            $ledgerMaster = Admin::findOrFail($id); // Model Admin use हो रहा है

            $ledgerMaster->delete();

            return back()->with('success', 'Vendor deleted successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function show($id)
    {
        $ledgerMaster = Admin::findOrFail($id);
        return view('admin.ledgerMaster.view', compact('ledgerMaster'));
    }
}