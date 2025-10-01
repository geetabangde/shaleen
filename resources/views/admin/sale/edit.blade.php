@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="row ledger-add-form">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                           <div>
                              <h4>👤 Sale</h4>
                           </div>
                           <a href="{{ route('admin.sale.index') }}" class="btn btn-primary" >
                              ⬅ Back
                           </a>
                        </div>
                        <form action="{{ route('admin.sale.update', $sale->id) }}" method="post">
                           @csrf
                           <div class="card-body">
                              <div class="row g-3">

                                    <!-- Date -->
                                    <div class="col-md-6">
                                       <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                       <input type="date" name="date" id="date"
                                             class="form-control @error('date') is-invalid @enderror"
                                             value="{{ old('date', $sale->date->format('Y-m-d')) }}">
                                       @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Sales Order ID -->
                                    <div class="col-md-6">
                                       <label for="sales_order_id" class="form-label">Sales Order ID <span class="text-danger">*</span></label>
                                       <input type="text" name="sales_order_id" id="sales_order_id"
                                             class="form-control @error('sales_order_id') is-invalid @enderror"
                                             value="{{ old('sales_order_id', $sale->sales_order_id) }}" disabled>
                                       @error('sales_order_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Broker Name -->
                                    <div class="col-md-6">
                                       <label class="form-label">Broker</label>
                                       <select name="broker_name" class="form-control @error('broker_name') is-invalid @enderror" required>
                                          <option value="">Select Broker</option>
                                          @foreach($brokers as $ledger)
                                                <option value="{{ $ledger->id }}" {{ old('broker_name', $sale->broker_name) == $ledger->id ? 'selected' : '' }}>
                                                   {{ $ledger->name }}
                                                </option>
                                          @endforeach
                                       </select>
                                       @error('broker_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Party Name -->
                                    <div class="col-md-6">
                                       <label class="form-label">Party Name</label>
                                       <select name="party_name" class="form-control @error('party_name') is-invalid @enderror" required>
                                          <option value="">Select Buyer</option>
                                          @foreach($buyers as $ledger)
                                                <option value="{{ $ledger->id }}" {{ old('party_name', $sale->party_name) == $ledger->id ? 'selected' : '' }}>
                                                   {{ $ledger->name }}
                                                </option>
                                          @endforeach
                                       </select>
                                       @error('party_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <!-- Item -->
                                    <div class="col-md-6">
                                       <label for="item_id" class="form-label">Item <span class="text-danger">*</span></label>
                                       <select name="item_id" id="item_id" 
                                                class="form-control @error('item_id') is-invalid @enderror">
                                          <option value="">-- Select Item --</option>
                                          @foreach($items as $item)
                                                <option value="{{ $item->id }}" 
                                                   {{ old('item_id', $sale->item_id ?? '') == $item->id ? 'selected' : '' }}>
                                                   {{ $item->item_name }}
                                                </option>
                                          @endforeach
                                       </select>
                                       @error('item_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <!-- Quantity -->
                                    <div class="col-md-6">
                                       <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                       <input type="number" step="0.01" name="quantity" id="quantity"
                                             class="form-control @error('quantity') is-invalid @enderror"
                                             value="{{ old('quantity', $sale->quantity) }}">
                                       @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Bags -->
                                    <div class="col-md-6">
                                       <label class="form-label">Bags</label>
                                       <select name="bags" class="form-control @error('bags') is-invalid @enderror" required>
                                          <option value="">Select Bag</option>
                                          @foreach($begs as $beg)
                                                <option value="{{ $beg->id }}" {{ old('bags', $sale->bags) == $beg->id ? 'selected' : '' }}>
                                                   {{ $beg->marking }}
                                                </option>
                                          @endforeach
                                       </select>
                                       @error('bags') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Brand -->
                                    <div class="col-md-6">
                                       <label for="brand" class="form-label">Brand</label>
                                       <input type="text" name="brand" id="brand"
                                             class="form-control @error('brand') is-invalid @enderror"
                                             value="{{ old('brand', $sale->brand) }}">
                                       @error('brand') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-6">
                                       <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                       <input type="number" step="0.01" name="price" id="price"
                                             class="form-control @error('price') is-invalid @enderror"
                                             value="{{ old('price', $sale->price) }}">
                                       @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Loading History Pending Balance -->
                                    <div class="col-md-6">
                                       <label for="loading_history_pending_balance" class="form-label">Loading History Pending Balance</label>
                                       <input type="text" name="loading_history_pending_balance" id="loading_history_pending_balance"
                                             class="form-control @error('loading_history_pending_balance') is-invalid @enderror"
                                             value="{{ old('loading_history_pending_balance', $sale->loading_history_pending_balance) }}">
                                       @error('loading_history_pending_balance') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Remark -->
                                    <div class="col-md-6">
                                       <label for="remark" class="form-label">Remark</label>
                                       <textarea name="remark" id="remark" rows="3"
                                                class="form-control @error('remark') is-invalid @enderror">{{ old('remark', $sale->remark) }}</textarea>
                                       @error('remark') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                              </div>

                              <div class="row mt-4">
                                    <div class="col-12 text-end">
                                       <button type="submit" class="btn btn-primary">Update Sale</button>
                                    </div>
                              </div>
                           </div>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- Script for Dynamic Address --}}
<script>
   let addressIndex = 1;

   function addAddress() {
       let container = document.getElementById('addressContainer');
       let html = `
       <div class="address-group border rounded p-3 mb-3">
           <div class="mb-3">
               <label class="form-label">Address</label>
               <input type="text" name="address[${addressIndex}][consignment_address]" class="form-control" placeholder="Enter Consignment Address" required>
           </div>
           <div class="mb-3">
               <label class="form-label">PIN Code</label>
               <input type="text" name="address[${addressIndex}][pincode]" class="form-control" placeholder="Enter PIN Code" required>
           </div>
           <div class="mb-3">
               <label class="form-label">State</label>
               <input type="text" name="address[${addressIndex}][state]" class="form-control" placeholder="Enter State" required>
           </div>
           <div class="mb-3">
               <label class="form-label">Country</label>
               <select name="address[${addressIndex}][country]" class="form-control" required>
                   <option value="India" selected>India</option>
                   <option value="USA">USA</option>
                   <option value="UK">UK</option>
                   <option value="Canada">Canada</option>
               </select>
           </div>
           <div class="text-end">
               <button type="button" class="btn btn-danger" onclick="removeAddress(this)">❌ Remove</button>
           </div>
       </div>`;
       container.insertAdjacentHTML('beforeend', html);
       addressIndex++;
   }

   function removeAddress(button) {
       button.closest('.address-group').remove();
   }
</script>
@endsection
