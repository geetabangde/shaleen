@extends('admin.layouts.app')

@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="card-title">✏️ Edit Bag</h4>
                    <a href="{{ route('admin.bags.index') }}" class="btn btn-primary" >
                     ⬅ Back
                  </a>
               </div>
              
             <form action="{{ route('admin.bags.update', $bag->id) }}" method="POST">
                     @csrf
                  

                     <div class="card-body p-4">
                        <div class="row g-3">

                              <div class="col-md-6">
                                 <label class="form-label">Date</label>
                                 <input type="date" name="bags_date"
                                       class="form-control @error('bags_date') is-invalid @enderror"
                                       value="{{ old('bags_date', $bag->date) }}">
                                 @error('bags_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Contract No.</label>
                                 <input type="text" name="bags_contract_no"
                                       class="form-control @error('bags_contract_no') is-invalid @enderror"
                                       value="{{ old('bags_contract_no', $bag->contract_no) }}">
                                 @error('bags_contract_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <!-- Buyer Dropdown -->
                              <div class="col-md-6">
                                 <label class="form-label">Buyer Name</label>
                                 <select name="bags_buyer_name" class="form-control @error('bags_buyer_name') is-invalid @enderror" required>
                                    <option value="">Select Buyer</option>
                                    @foreach($buyers as $ledger)
                                          <option value="{{ $ledger->id }}" {{ old('bags_buyer_name', $bag->buyer_name) == $ledger->id ? 'selected' : '' }}>
                                             {{ $ledger->name }}
                                          </option>
                                    @endforeach
                                 </select>
                                 @error('bags_buyer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <!-- Seller Dropdown -->
                              <div class="col-md-6">
                                 <label class="form-label">Seller Name</label>
                                 <select name="bags_seller_name" class="form-control @error('bags_seller_name') is-invalid @enderror" required>
                                    <option value="">Select Seller</option>
                                    @foreach($sellers as $ledger)
                                          <option value="{{ $ledger->id }}" {{ old('bags_seller_name', $bag->seller_name) == $ledger->id ? 'selected' : '' }}>
                                             {{ $ledger->name }}
                                          </option>
                                    @endforeach
                                 </select>
                                 @error('bags_seller_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Packing</label>
                                 <input type="text" name="bags_packing"
                                       class="form-control @error('bags_packing') is-invalid @enderror"
                                       value="{{ old('bags_packing', $bag->packing) }}">
                                 @error('bags_packing') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Number of Container</label>
                                 <input type="number" name="bags_number_of_container"
                                       class="form-control @error('bags_number_of_container') is-invalid @enderror"
                                       value="{{ old('bags_number_of_container', $bag->number_of_container) }}">
                                 @error('bags_number_of_container') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Marking</label>
                                 <input type="text" name="bags_marking"
                                       class="form-control @error('bags_marking') is-invalid @enderror"
                                       value="{{ old('bags_marking', $bag->marking) }}">
                                 @error('bags_marking') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Price</label>
                                 <input type="number" step="0.01" name="bags_price"
                                       class="form-control @error('bags_price') is-invalid @enderror"
                                       value="{{ old('bags_price', $bag->price) }}">
                                 @error('bags_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Quantity</label>
                                 <input type="number" name="bags_quantity"
                                       class="form-control @error('bags_quantity') is-invalid @enderror"
                                       value="{{ old('bags_quantity', $bag->quantity) }}">
                                 @error('bags_quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <!-- ✅ Number of field added properly -->
                              <div class="col-md-6">
                                 <label class="form-label">Number of</label>
                                 <input type="number" name="bags_number_of"
                                       class="form-control @error('bags_number_of') is-invalid @enderror"
                                       value="{{ old('bags_number_of', $bag->number_of) }}">
                                 @error('bags_number_of') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Broker</label>
                                 <select name="bags_broker" class="form-control @error('bags_broker') is-invalid @enderror" required>
                                    <option value="">Select Broker</option>
                                    @foreach($brokers as $ledger)
                                          <option value="{{ $ledger->id }}" {{ old('bags_broker', $bag->broker) == $ledger->id ? 'selected' : '' }}>
                                             {{ $ledger->name }}
                                          </option>
                                    @endforeach
                                 </select>
                                 @error('bags_broker') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-6">
                                 <label class="form-label">Delivery At</label>
                                 <input type="text" name="bags_delivery_at"
                                       class="form-control @error('bags_delivery_at') is-invalid @enderror"
                                       value="{{ old('bags_delivery_at', $bag->delivery_at) }}">
                                 @error('bags_delivery_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>

                              <div class="col-md-12 mb-3">
                                 <label class="form-label">Remark</label>
                                 <textarea name="bags_remark"
                                          class="form-control @error('bags_remark') is-invalid @enderror">{{ old('bags_remark', $bag->remark) }}</textarea>
                                 @error('bags_remark') <div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                        </div>
                        <div class="text-end">
                              <button type="submit" class="btn btn-primary">Update Bag</button>
                        </div>
                     </div>
                  </form>


            </div>
         </div>
      </div>
   </div>
</div>
@endsection