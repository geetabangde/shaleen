<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Admin;
use App\Models\Bag;
use App\Models\Sale;
use Illuminate\Support\Str;
class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::latest()->get();
        
        return view('admin.sale.index',compact('sales'));
    }
    public function create()
   {
        $ledgers = Admin::all();
        $begs = Bag::all();

        
        $buyers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('buyer', $types ?? []);
        });

    
        $sellers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('seller', $types ?? []);
        });

    
        $brokers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('broker', $types ?? []);
        });

        return view('admin.sale.create',compact('buyers','sellers','brokers','begs'));
    }

     // Store new sale from request
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'date' => 'required|date',
            // 'sales_order_id' => 'required|string|unique:sales,sales_order_id',
            'broker_name' => 'nullable|string|max:255',
            'party_name' => 'required|string|max:255',
            'item' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'bags' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'remark' => 'nullable|string',
            'loading_history_pending_balance' => 'nullable|string',
        ]);
         $salesOrderId = 'SO-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));

   
        $validated['sales_order_id'] = $salesOrderId;

      
        Sale::create($validated);

    return redirect()->route('admin.sale.index')
                     ->with('success', 'Sale contract saved successfully!');
    }

    public function edit($id)
   {
    $sale = Sale::findOrFail($id);

        $ledgers = Admin::all();
        $begs = Bag::all();

        
        $buyers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('buyer', $types ?? []);
        });

    
        $sellers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('seller', $types ?? []);
        });

    
        $brokers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('broker', $types ?? []);
        });
        return view('admin.sale.edit',compact('buyers','sellers','brokers','begs','sale'));
    }
   
    public function update(Request $request, $id)
    {
        // Find the sale record
        $sale = Sale::findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'date' => 'required|date',
            // 'sales_order_id' => "required|string|unique:sales,sales_order_id,$id",
            'broker_name' => 'required|exists:admins,id',
            'party_name' => 'required|exists:admins,id',
            'item' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'bags' => 'required|exists:bags,id',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'remark' => 'nullable|string|max:500',
            'loading_history_pending_balance' => 'nullable|string|max:255',
        ]);

        // Update the sale record
        $sale->update($validated);

        // Redirect back with success message
        return redirect()->route('admin.sale.index')
        ->with('success', 'Sale updated successfully!');
    }


    public function show($id)
    {
        $sale = Sale::with(['broker', 'partyname', 'beg'])->findOrFail($id);
        return view('admin.sale.view', compact('sale'));
    }
    public function SubSale($id)
    {
        $sale = Sale::with(['broker', 'partyname', 'beg'])->findOrFail($id);
        return view('admin.sale.subindex', compact('sale'));
    }

    public function destroy($id)
    {
        // Find the sale record
        $sale = Sale::findOrFail($id);

        // Delete the record
        $sale->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Sale deleted successfully!');
    }

}
