@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
               <div class="row view-form">
                    <div class="col-12">
                        <div class="card-header">
                            <a href="{{ route('admin.sale.index') }}" class="btn btn-primary">Back</a>
                            <!-- Add Button -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubSaleModal">
                            Add Sub Sale
                            </button>
                            <h5 class="mt-4">Sub Sales List</h5>
                            <h6 class="mb-3">Order Details for {{ $sale->sales_order_id }}</h6>
                        </div>
                    </div>
                    <div class="modal fade" id="addSubSaleModal" tabindex="-1" aria-labelledby="addSubSaleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSubSaleModalLabel">Add Sub Sale</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.sale.subSale.store', $sale->id) }}" method="post">
                                    @csrf
                                    <div class="row g-3">

                                        <!-- Quantity -->
                                        <div class="col-md-3">
                                            <!-- (Available: {{ $sale->quantity }})  -->
                                            <label>Quantity <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="quantity" id="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                value="{{ old('quantity') }}">
                                            @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <!-- Sale Price -->
                                        <div class="col-md-3">
                                            <label for="sale_price" class="form-label">Sale Price <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" name="sale_price" id="sale_price"
                                                class="form-control @error('sale_price') is-invalid @enderror"
                                                value="{{ old('sale_price') }}">
                                            @error('sale_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <!-- unit Price -->
                                        <div class="col-md-3">
                                            <label for="unit" class="form-label">Sale Unit </label>
                                            <input type="text"  name="unit" id="unit"
                                                class="form-control @error('unit') is-invalid @enderror"
                                                value="{{ old('unit') }}">
                                            @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <!-- <div class="col-md-3" >
                                            <label>Invoice No</label> -->
                                            <input type="text" class="form-control" value="{{ old('invoice_no', $nextInvoiceNo ?? '') }}" readonly style="display:none">
                                        <!-- </div> -->
                                        <div class="col-md-3">
                                            <label>Invoice Date</label>
                                            <input type="date" class="form-control" value="{{ old('invoice_date', now()->format('Y-m-d')) }}" readonly>
                                        </div>
                                        <!-- Delivery Note -->
                                        <div class="col-md-3">
                                            <label>Delivery Note</label>
                                            <input type="text" name="delivery_note" class="form-control" value="{{ old('delivery_note') }}">
                                        </div>

                                        <!-- Mode / Terms of Payment -->
                                        <div class="col-md-3">
                                            <label>Mode/Terms of Payment</label>
                                            <input type="text" name="mode_terms_of_payment" class="form-control" value="{{ old('mode_terms_of_payment') }}">
                                        </div>

                                        <!-- Reference No & Date -->
                                        <div class="col-md-3">
                                            <label>Reference No & Date</label>
                                            <input type="text" name="reference_no" class="form-control" value="{{ old('reference_no') }}">
                                        </div>

                                        <!-- Other References -->
                                        <div class="col-md-3">
                                            <label>Other References</label>
                                            <input type="text" name="other_references" class="form-control" value="{{ old('other_references') }}">
                                        </div>

                                        <!-- Buyer's Order No -->
                                        <div class="col-md-3">
                                            <label>Buyer's Order No</label>
                                            <input type="text" name="buyer_order_no" class="form-control" value="{{ old('buyer_order_no') }}">
                                        </div>

                                        <!-- Dated -->
                                        <div class="col-md-3">
                                            <label>Dated</label>
                                            <input type="date" name="dated" class="form-control" value="{{ old('dated') }}">
                                        </div>

                                        <!-- Dispatch Doc No -->
                                        <div class="col-md-3">
                                            <label>Dispatch Doc No</label>
                                            <input type="text" name="dispatch_doc_no" class="form-control" value="{{ old('dispatch_doc_no') }}">
                                        </div>

                                        <!-- Delivery Note Date -->
                                        <div class="col-md-3">
                                            <label>Delivery Note Date</label>
                                            <input type="date" name="delivery_note_date" class="form-control" value="{{ old('delivery_note_date') }}">
                                        </div>

                                        <!-- Dispatched Through -->
                                        <div class="col-md-3">
                                            <label>Dispatched Through</label>
                                            <input type="text" name="dispatched_through" class="form-control" value="{{ old('dispatched_through') }}">
                                        </div>
                                        
                                        <!-- Destination -->
                                        <div class="col-md-3">
                                            <label>Destination</label>
                                            <select name="destination" class="form-control @error('destination') is-invalid @enderror">
                                                <option value="">Select Destination</option>
                                                @foreach($destinations as $id => $address)
                                                    <option value="{{ $address }}" {{ old('destination') == $address ? 'selected' : '' }}>
                                                        {{ $address }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('destination') 
                                                <div class="invalid-feedback">{{ $message }}</div> 
                                            @enderror
                                        </div>


                                        <!-- Bill of Lading / LR-RR No -->
                                        <div class="col-md-3">
                                            <label>Bill of Lading / LR-RR No</label>
                                            <input type="text" name="bill_lr_no" class="form-control" value="{{ old('bill_lr_no') }}">
                                        </div>

                                        <!-- Motor Vehicle No -->
                                        <div class="col-md-3">
                                            <label>Motor Vehicle No</label>
                                            <input type="text" name="motor_vehicle_no" class="form-control" value="{{ old('motor_vehicle_no') }}">
                                        </div>

                                        <!-- Terms of Delivery -->
                                        <div class="col-md-3">
                                            <label>Terms of Delivery</label>
                                            <input type="text" name="terms_of_delivery" class="form-control" value="{{ old('terms_of_delivery') }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label>Delivery Type <span class="text-danger">*</span></label>
                                            <select name="delivery_type" class="form-control" required>
                                                <option value="spot">Spot Delivery</option>
                                                <option value="normal">Normal Delivery</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 text-end">
                                            <button type="submit" class="btn btn-primary">Save Sub-Sale</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" >
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Quantity</th>
                                            <th>Sale Price</th>
                                            <th>Sale Unit</th>
                                            <th>Invoice No</th>
                                            <th>Invoice Date</th>
                                            <th>Mode/Terms of Payment</th>
                                            <th>Dispatch Doc No</th>
                                            <th>Delivery Note Date</th>
                                            <th>Dispatched Through</th>
                                            <th>Motor Vehicle No</th>
                                            <th>Terms of Delivery</th>
                                            <th>Dated</th>
                                            <th>Destination</th>
                                            <th>Bill of Lading / LR-RR No</th>
                                            <th>Buyer’s Order No.</th>
                                            <th>Other References</th>
                                            <th>Reference No. & Date</th>
                                            <th>Delivery Note</th>
                                            <th>Delivery Note Date</th>
                                            
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sale->subSales as $sub)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <!-- Status -->
                                                <td>
                                                    @if($sub->status === 'delivered')
                                                        <span class="badge bg-success">Mark as Delivered</span>
                                                    @else
                                                        <span class="badge bg-warning">Pending</span>
                                                    @endif
                                                </td>

                                                <!-- Action -->
                                                <td>
                                                    @if($sub->status === 'pending' && $sub->delivery_type === 'normal')
                                                        <form action="{{ route('admin.sale.subSale.markDelivered', $sub->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-sm btn-success">Pending</button>
                                                        </form>
                                                    @else
                                                        {{ ucfirst($sub->status) }}
                                                    @endif
                                                </td>

                                                <td>{{ $sub->quantity }}</td>
                                                <td>{{ number_format($sub->sale_price, 2) }}</td>
                                                <td>{{ $sub->unit ?? '-' }}</td>
                                                <td>{{ $sub->invoice_no }}</td>
                                                <td>{{ $sub->invoice_date }}</td>
                                                <td>{{ $sub->mode_terms_of_payment ?? '-' }}</td>
                                                <td>{{ $sub->dispatch_doc_no ?? '-' }}</td>
                                                <td>{{ $sub->delivery_note_date ? \Carbon\Carbon::parse($sub->delivery_note_date)->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $sub->dispatched_through ?? '-' }}</td>
                                                <td>{{ $sub->motor_vehicle_no ?? '-' }}</td>
                                                <td>{{ $sub->terms_of_delivery ?? '-' }}</td>
                                                <td>{{ $sub->dated ?? '-' }}</td>
                                                <td>{{ $sub->destination ?? '-' }}</td>
                                                <td>{{ $sub->bill_lr_no ?? '-' }}</td>
                                                <td>{{ $sub->buyer_order_no ?? '-' }}</td>
                                                <td>{{ $sub->other_references ?? '-' }}</td>
                                                <td>{{ $sub->reference_no ?? '-' }}</td>
                                                <td>{{ $sub->delivery_note ?? '-' }}</td>
                                                <td>{{ $sub->delivery_note_date ?? '-' }}</td>
                                                <td>{{ $sub->created_at->format('d-m-Y h:i A') }}</td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No sub-sales available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Remaining Quantity -->
                        <div class="mt-3">
                            <strong>Remaining Quantity: </strong> {{ $sale->quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
