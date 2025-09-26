<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Admin;
class PurchaseController extends Controller
{
public function index()
{
   
    $purchases = Purchase::with(['buyer', 'seller'])->latest()->get();
    return view('admin.purchase.index', compact('purchases'));
}

public function create()
{
   
    $ledgers = Admin::all();

   
    $buyers = $ledgers->filter(function($ledger){
        $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
        return in_array('buyer', $types ?? []);
    });

    $sellers = $ledgers->filter(function($ledger){
        $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
        return in_array('seller', $types ?? []);
    });

    return view('admin.purchase.create', compact('buyers', 'sellers'));
}

  public function store(Request $request)
    {
        
      $validated =   $request->validate([
            'raw_date'           => 'required|date',
            'raw_contract_no'    => 'required|string|max:255',
            'raw_buyer_name'     => 'required|string|max:255',
            'raw_seller_name'    => 'required|string|max:255',
            'raw_commodity'      => 'required|string|max:255',
            'raw_specification'  => 'nullable|string|max:255',
            'raw_price'          => 'required|numeric',
            'raw_packing'        => 'nullable|string|max:255',
            'raw_delivery'       => 'nullable|string|max:255',
            'raw_quantity'       => 'required|integer',
            'raw_bags_condition' => 'nullable|string|max:255',
            'raw_payment_terms'  => 'nullable|string|max:255',
            'raw_terms_conditions' => 'nullable|string',
        ]);
       $validated['status'] = 'Await Delivery';
      
      Purchase::create($validated);

        return redirect()->route('admin.purchase.index')
            ->with('success', 'Purchase created successfully!');
    }
    public function edit($id)
{
       $ledgers=Admin::all();
     $buyers = $ledgers->filter(function($ledger){
        $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
        return in_array('buyer', $types ?? []);
    });

    $sellers = $ledgers->filter(function($ledger){
        $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
        return in_array('seller', $types ?? []);
    });
    $purchase = Purchase::findOrFail($id);
 

    return view('admin.purchase.edit', compact('purchase','sellers','buyers'));
}
public function destroy($id)
{
    try {
        $purchase = Purchase::findOrFail($id); 

        $purchase->delete();

        return back()->with('success', 'Purchase deleted successfully.');

    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong! ' . $e->getMessage());
    }
}
public function update(Request $request, $id)
{
    
    $purchase = Purchase::findOrFail($id);

   
    $request->validate([
        'raw_date' => 'required|date',
        'raw_contract_no' => 'required|string|max:255',
        'raw_buyer_name' => 'required|string|max:255',
        'raw_seller_name' => 'required|string|max:255',
        'raw_commodity' => 'required|string|max:255',
        'raw_specification' => 'nullable|string|max:255',
        'raw_price' => 'required|numeric',
        'raw_packing' => 'nullable|string|max:255',
        'raw_delivery' => 'nullable|string|max:255',
        'raw_quantity' => 'required|numeric',
        'raw_bags_condition' => 'nullable|string|max:255',
        'raw_payment_terms' => 'nullable|string|max:255',
        'raw_terms_conditions' => 'nullable|string',
    ]);

    
    $purchase->update([
        'raw_date' => $request->raw_date,
        'raw_contract_no' => $request->raw_contract_no,
        'raw_buyer_name' => $request->raw_buyer_name,
        'raw_seller_name' => $request->raw_seller_name,
        'raw_commodity' => $request->raw_commodity,
        'raw_specification' => $request->raw_specification,
        'raw_price' => $request->raw_price,
        'raw_packing' => $request->raw_packing,
        'raw_delivery' => $request->raw_delivery,
        'raw_quantity' => $request->raw_quantity,
        'raw_bags_condition' => $request->raw_bags_condition,
        'raw_payment_terms' => $request->raw_payment_terms,
        'raw_terms_conditions' => $request->raw_terms_conditions,
    ]);

   
    return redirect()->route('admin.purchase.index')->with('success', 'Purchase updated successfully.');
}
public function show($id)
{
    $purchase = Purchase::findOrFail($id);
    $ledgers=Admin::all();

    return view('admin.purchase.view', compact('purchase','ledgers'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string|max:255',
    ]);

    $purchase = Purchase::findOrFail($id);
    $purchase->status = $request->status;
    $purchase->save();

    return redirect()->back()->with('success', 'Status updated successfully!');
}

}