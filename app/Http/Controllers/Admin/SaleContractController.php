<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\SaleContract;
use App\Models\Admin;
class SaleContractController extends Controller
{
    public function index()
    {   
        $saleContracts = SaleContract::with(['buyer', 'seller'])->latest()->get();
        return view('admin.saleContracts.index', compact('saleContracts'));
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

        return view('admin.saleContracts.create', compact('buyers', 'sellers'));
    }
    public function store(Request $request)
    {   
        
        $validated = $request->validate([
            'contract_date'       => 'required|date',
            'contract_no'         => 'required|string|max:255',
            'seller_name'         => 'required|string|max:255',
            'buyer_name'          => 'required|string|max:255',
            'commodity'           => 'required|string|max:255',
            'packing'             => 'required|string|max:255',
            'shipment_date'       => 'required|date',
            'price'               => 'required|numeric',
            'quantity'            => 'required|integer',
            'payment_terms'        => 'required|string|max:255',
            'seller_bank_details' => 'required|string',
            'terms_conditions'    => 'nullable|string',
            'documents.*'         => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'document_names.*'    => 'nullable|string|max:255',
        ]);

        // total value calculate
        $validated['total_value'] = $request->price * $request->quantity;

        
        // handle multiple documents like image
        // handle multiple documents with names
        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $file) {
                if ($file->isValid()) {
                    $fileName = 'document_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/documents'), $fileName);

                    $documents[] = [
                        'name' => $request->document_names[$index] ?? '', // get corresponding name
                        'file' => url('uploads/documents/' . $fileName),  // store full URL
                    ];
                }
            }
        }
        $validated['documents'] = json_encode($documents);

        // Remove document_names from validated array to avoid Array to string conversion
        unset($validated['document_names']);


        // create record
        SaleContract::create($validated);

        return redirect()->route('admin.saleContracts.index')
            ->with('success', 'Sale Contract created successfully!');
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
        $saleContract = SaleContract::findOrFail($id);

        return view('admin.saleContracts.edit', compact('saleContract','sellers','buyers'));
    }

    public function destroy($id)
    {
        $saleContract = SaleContract::findOrFail($id);

        // Delete uploaded documents from server
        if ($saleContract->documents) {
            $docs = json_decode($saleContract->documents, true);
            foreach ($docs as $docUrl) {
                $filePath = public_path(parse_url($docUrl, PHP_URL_PATH));
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
        $saleContract->delete();

        return redirect()->route('admin.saleContracts.index')
                        ->with('success', 'Sale Contract deleted successfully!');
    }
        
    public function update(Request $request, $id)
    {
        $saleContract = SaleContract::findOrFail($id);

        $validated = $request->validate([
            'contract_date'       => 'required|date',
            'contract_no'         => 'required|string|max:255',
            'seller_name'         => 'required|string|max:255',
            'buyer_name'          => 'required|string|max:255',
            'commodity'           => 'required|string|max:255',
            'packing'             => 'required|string|max:255',
            'shipment_date'       => 'required|date',
            'price'               => 'required|numeric',
            'quantity'            => 'required',
            'payment_terms'       => 'required|string|max:255',
            'seller_bank_details' => 'required|string',
            'terms_conditions'    => 'nullable|string',
            'documents.*'         => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'document_names.*'    => 'nullable|string|max:255',
        ]);

        // Calculate total value
        $validated['total_value'] = $request->price * $request->quantity;

        // Get existing documents
        $documentPaths = $saleContract->documents ? json_decode($saleContract->documents, true) : [];

        // Handle new uploaded documents
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $file) {
                if ($file->isValid()) {
                    $fileName = 'document_' . time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/documents'), $fileName);

                    $documentPaths[] = [
                        'name' => $request->document_names[$index] ?? 'Document',
                        'file' => url('uploads/documents/' . $fileName),
                    ];
                }
            }
        }

        // Save JSON
        $validated['documents'] = json_encode($documentPaths);

        // Remove document_names from validated array
        unset($validated['document_names']);

        // Update record
        $saleContract->update($validated);

        return redirect()->route('admin.saleContracts.index')
                        ->with('success', 'Sale Contract updated successfully!');
    }


    public function show($id)
    {
        $saleContract = SaleContract::findOrFail($id);
        $ledgers=Admin::all();

        return view('admin.saleContracts.view', compact('saleContract','ledgers'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $saleContract = SaleContract::findOrFail($id);
        $saleContract->status = $request->status;
        $saleContract->save();

        return redirect()->route('admin.saleContracts.index')->with('success', 'Sale Contract status updated successfully.');
    }

}