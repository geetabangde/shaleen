<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Admin;
use App\Models\Bag;
use App\Models\Sale;
use App\Models\SubSale;
use App\Models\ItemMaster;
use Illuminate\Support\Str;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('subSales')->latest()->get();
        // return($sales);
        return view('admin.sale.index',compact('sales'));
    }
    public function create()
   {
        $ledgers = Admin::all();
        $begs = Bag::all();
        $items = ItemMaster::all();
        
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

        // ✅ Destinations decode kar ke
        $destinations = Admin::all()->mapWithKeys(function($admin){
        $addresses = json_decode($admin->address, true);
            if(!empty($addresses) && isset($addresses[0]['consignment_address'])){
                return [$admin->id => $addresses[0]['consignment_address']];
            }
            return [];
        });

        return view('admin.sale.create',compact('buyers','sellers','brokers','begs','destinations','items'));
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
            // 'item' => 'required|string|max:255',
            'item_id' => 'required|exists:item_masters,id',
            'quantity' => 'required|numeric|min:0',
            'bags' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'unit' => 'nullable|string|max:255',
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
        $items = ItemMaster::all(); 

        
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
        return view('admin.sale.edit',compact('buyers','sellers','brokers','begs','sale','items'));
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
            'item_id' => 'required|exists:item_masters,id',
            'quantity' => 'required|numeric',
            'bags' => 'required|exists:bags,id',
            'brand' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'unit' => 'nullable|string|max:255',
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

        // ✅ Destinations decode kar ke
        $destinations = Admin::all()->mapWithKeys(function($admin){
        $addresses = json_decode($admin->address, true);
            if(!empty($addresses) && isset($addresses[0]['consignment_address'])){
                return [$admin->id => $addresses[0]['consignment_address']];
            }
            return [];
        });
         // Generate invoice number & date for new SubSale
        $invoice_no = 'INV-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));
        $invoice_date = now()->format('Y-m-d');

        return view('admin.sale.view', compact('sale','destinations','invoice_no','invoice_date'));
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

    public function subSaleStore(Request $request, $id)
    {
            $request->validate([
                'quantity'   => 'required|numeric|min:0.01',
                'sale_price' => 'required|numeric|min:0.01',
                'delivery_type' => 'required|in:spot,normal',
            ]);

            $sale = Sale::findOrFail($id);

            if ($request->quantity > $sale->quantity) {
                return back()->withErrors(['quantity' => 'Quantity exceeds available stock']);
            }

            // Reduce main sale quantity
            $sale->quantity -= $request->quantity;
            $sale->save();
            
            // ✅ Generate invoice number and date here
            $invoiceNo = 'INV-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4));
            $invoiceDate = now()->format('Y-m-d');
            
            // ✅ Status set karna based on delivery_type
           $status = $request->delivery_type === 'spot' ? 'delivered' : 'pending';

            // Store sub-sale
            SubSale::create([
                'sale_id'    => $sale->id,
                'quantity'   => $request->quantity,
                'unit'       => $request->unit,
                'sale_price' => $request->sale_price,
                'mode_terms_of_payment' => $request->mode_terms_of_payment,
                'dispatch_doc_no' => $request->dispatch_doc_no,
                'delivery_note_date' => $request->delivery_note_date,
                'dispatched_through' => $request->dispatched_through,
                'motor_vehicle_no' => $request->motor_vehicle_no,
                'terms_of_delivery' => $request->terms_of_delivery,
                'delivery_note' => $request->delivery_note,
                'reference_no' => $request->reference_no,
                'other_references' => $request->other_references,
                'buyer_order_no' => $request->buyer_order_no,
                'dated' => $request->dated,
                'destination' => $request->destination,
                'bill_lr_no' => $request->bill_lr_no,
                'invoice_no' => $invoiceNo,
                'invoice_date' => $invoiceDate,
                'delivery_type' => $request->delivery_type,
                'status' => $status, 
            ]);
            
            return redirect()->route('admin.sale.view', $sale->id)
                    ->with('success', 'Sale contract saved successfully!');
    }

    public function markDelivered($id)
    {
        $subSale = SubSale::findOrFail($id);

        if ($subSale->status === 'pending') {
            $subSale->status = 'delivered';
            $subSale->save();
        }

        return back()->with('success', 'Sub Sale marked as delivered successfully!');
    }
    public function invoice($saleId, $subSaleId = null)
    {
        $sale = Sale::with('subSales', 'broker', 'partyname')->findOrFail($saleId);

        $subSale = null;
        if ($subSaleId) {
            $subSale = $sale->subSales()->findOrFail($subSaleId);
        }
        // return($sale);

        return view('admin.sale.invoice', compact('sale', 'subSale'));
    }





}
