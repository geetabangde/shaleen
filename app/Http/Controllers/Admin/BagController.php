<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Bag;

class BagController extends Controller
{
    public function index()
    {
        $bags = Bag::with(['buyer', 'seller'])->latest()->get();
        return view('admin.bags.index',compact('bags'));
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
        $brokers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('broker', $types ?? []);
        });
        return view('admin.bags.create', compact('buyers', 'sellers', 'brokers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bags_date' => 'nullable|date',
            'bags_contract_no' => 'nullable|string|max:255',
            'bags_buyer_name' => 'nullable|string|max:255',
            'bags_seller_name' => 'nullable|string|max:255',
            'bags_packing' => 'nullable|string|max:255',
            'bags_number_of_container' => 'nullable|integer',
            'bags_marking' => 'nullable|string|max:255',
            'bags_price' => 'nullable|numeric',
            'bags_quantity' => 'nullable|numeric',
            'bags_broker' => 'nullable|string|max:255',
            'bags_delivery_at' => 'nullable|string|max:255',
            'bags_remark' => 'nullable|string',
        ]);
        Bag::create([
            'date' => $request->bags_date,
            'contract_no' => $request->bags_contract_no,
            'buyer_name' => $request->bags_buyer_name,
            'seller_name' => $request->bags_seller_name,
            'packing' => $request->bags_packing,
            'number_of_container' => $request->bags_number_of_container,
            'marking' => $request->bags_marking,
            'price' => $request->bags_price,
            'quantity' => $request->bags_quantity,
            'broker' => $request->bags_broker,
            'delivery_at' => $request->bags_delivery_at,
            'remark' => $request->bags_remark,
            'number_of' => $request->bags_number_of,
            'status' => 'Await Delivery', 
        ]);
        return redirect()->route('admin.bags.index')
        ->with('success', 'Bags contract saved successfully!');
    }
    public function edit($id)
    {
        $bag = Bag::findOrFail($id);
        $ledgers = Admin::all();

        // Buyers filter
        $buyers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('buyer', $types ?? []);
        });

        // Sellers filter
        $sellers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('seller', $types ?? []);
        });

        // Brokers filter
        $brokers = $ledgers->filter(function($ledger){
            $types = is_array($ledger->types) ? $ledger->types : json_decode($ledger->types, true);
            return in_array('broker', $types ?? []);
        });

        return view('admin.bags.edit', compact('bag','buyers','sellers','brokers'));
    }

    public function show($id)
    {
        $bag= Bag::findOrFail($id);
        $ledgers=Admin::all();

        return view('admin.bags.view', compact('bag','ledgers'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'bags_date'               => 'required|date',
            'bags_contract_no'        => 'nullable|string|max:255',
            'bags_buyer_name'         => 'required|exists:admins,id',
            'bags_seller_name'        => 'required|exists:admins,id',
            'bags_packing'            => 'nullable|string|max:255',
            'bags_number_of_container'=> 'nullable|integer',
            'bags_marking'            => 'nullable|string|max:255',
            'bags_price'              => 'nullable|numeric',
            'bags_quantity'           => 'nullable|numeric',
            'bags_broker'             => 'nullable|string|max:255',
            'bags_delivery_at'        => 'nullable|string|max:255',
            'bags_remark'             => 'nullable|string',
        ]);

        $bag = Bag::findOrFail($id);

        $bag->date                = $request->bags_date;
        $bag->contract_no         = $request->bags_contract_no;
        $bag->buyer_name          = $request->bags_buyer_name; 
        $bag->seller_name         = $request->bags_seller_name; 
        $bag->packing             = $request->bags_packing;
        $bag->number_of_container = $request->bags_number_of_container;
        $bag->marking             = $request->bags_marking;
        $bag->price               = $request->bags_price;
        $bag->quantity            = $request->bags_quantity;
        $bag->broker              = $request->bags_broker;
        $bag->delivery_at         = $request->bags_delivery_at;
        $bag->remark              = $request->bags_remark;
        $bag->number_of            = $request->bags_number_of;
        

        $bag->save();

        return redirect()->route('admin.bags.index')
                        ->with('success', 'Bag updated successfully.');
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $bag = Bag::findOrFail($id);
        $bag->status = $request->status;
        $bag->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function destroy($id)
    {
        $bag = Bag::findOrFail($id);

        if ($bag->delete()) {
            return back()->with('success', 'Bag deleted successfully!');
        }

        return back()->with('error', 'Failed to delete Bag. Please try again.');
    }


}