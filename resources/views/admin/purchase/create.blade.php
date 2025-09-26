@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>🌾 Add Raw Material</h4>
                  </div>
                  <a href="{{ route('admin.purchase.index') }}" class="btn btn-primary" >
                     ⬅ Back
                  </a>
               </div>
               <form action="{{ route('admin.purchase.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                 <div class="card-body p-4">
                     <div class="row g-3"> 
                        <div class="col-md-6">
                              <label class="form-label">Date</label>
                              <input type="date" name="raw_date" class="form-control @error('raw_date') is-invalid @enderror" value="{{ old('raw_date') }}">
                              @error('raw_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Contract No.</label>
                              <input type="text" name="raw_contract_no" class="form-control @error('raw_contract_no') is-invalid @enderror" value="{{ old('raw_contract_no') }}">
                              @error('raw_contract_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Buyer Name</label>
                              <select name="raw_buyer_name" class="form-control @error('raw_buyer_name') is-invalid @enderror" required>
                                 <option value="">Select Buyer</option>
                                 @foreach($buyers as $ledger)
                                    <option value="{{ $ledger->id }}" {{ old('raw_buyer_name') == $ledger->id ? 'selected' : '' }}>{{ $ledger->name }}</option>
                                 @endforeach
                              </select>
                              @error('raw_buyer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Seller Name</label>
                              <select name="raw_seller_name" class="form-control @error('raw_seller_name') is-invalid @enderror" required>
                                 <option value="">Select Seller</option>
                                 @foreach($sellers as $ledger)
                                    <option value="{{ $ledger->id }}" {{ old('raw_seller_name') == $ledger->id ? 'selected' : '' }}>{{ $ledger->name }}</option>
                                 @endforeach
                              </select>
                              @error('raw_seller_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Commodity</label>
                              <input type="text" name="raw_commodity" class="form-control @error('raw_commodity') is-invalid @enderror" value="{{ old('raw_commodity') }}">
                              @error('raw_commodity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Specification</label>
                              <input type="text" name="raw_specification" class="form-control @error('raw_specification') is-invalid @enderror" value="{{ old('raw_specification') }}">
                              @error('raw_specification') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Price</label>
                              <input type="number" step="0.01" name="raw_price" class="form-control @error('raw_price') is-invalid @enderror" value="{{ old('raw_price') }}">
                              @error('raw_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Packing</label>
                              <input type="text" name="raw_packing" class="form-control @error('raw_packing') is-invalid @enderror" value="{{ old('raw_packing') }}">
                              @error('raw_packing') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Delivery</label>
                              <input type="text" name="raw_delivery" class="form-control @error('raw_delivery') is-invalid @enderror" value="{{ old('raw_delivery') }}">
                              @error('raw_delivery') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Quantity (Kg)</label>
                              <input type="number" name="raw_quantity" class="form-control @error('raw_quantity') is-invalid @enderror" value="{{ old('raw_quantity') }}">
                              @error('raw_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Bags Condition</label>
                              <input type="text" name="raw_bags_condition" class="form-control @error('raw_bags_condition') is-invalid @enderror" value="{{ old('raw_bags_condition') }}">
                              @error('raw_bags_condition') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                              <label class="form-label">Payment Terms</label>
                              <input type="text" name="raw_payment_terms" class="form-control @error('raw_payment_terms') is-invalid @enderror" value="{{ old('raw_payment_terms') }}">
                              @error('raw_payment_terms') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                              <label class="form-label">Terms & Conditions</label>
                              <textarea name="raw_terms_conditions" class="form-control @error('raw_terms_conditions') is-invalid @enderror">{{ old('raw_terms_conditions') }}</textarea>
                              @error('raw_terms_conditions') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 text-end">
                              <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                     </div>
                  </div>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection