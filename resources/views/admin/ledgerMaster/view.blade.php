@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               
               <div class="card-body">
                  <div class="row view-form">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between align-items-center">
                              <div>
                                 <h4>👤 View Vendor Details</h4>
                                 <p>Review the details of the selected customer.</p>
                              </div>
                              <a href="{{ route('admin.ledgerMaster.index') }}" 
                                 class="btn btn-primary" 
                                 >
                                 ⬅ Back to Listing
                              </a>
                           </div>
                           <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Customer Name:</strong> {{ $ledgerMaster->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Email:</strong> {{ $ledgerMaster->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Contact No:</strong> {{ $ledgerMaster->contact_number }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>PAN Number:</strong> {{ $ledgerMaster->pan_number ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>TAN Number:</strong> {{ $ledgerMaster->tan_number ?? '-' }}</p>
                                    </div>
                                </div>

                                <h5 class="mt-3">🏦 Bank Details</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Bank Name:</strong> {{ $ledgerMaster->bank_name ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Account Number:</strong> {{ $ledgerMaster->account_number ?? '-' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Account Type:</strong> {{ ucfirst($ledgerMaster->account_type ?? '-') }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>IFSC Code:</strong> {{ $ledgerMaster->ifsc_code ?? '-' }}</p>
                                    </div>
                                </div>
                          <div class="col-md-6">
                              <label class="form-label">Profile Image</label>
                              <div id="imagePreviewContainer"
                                 style="position: relative; width: 70px; height: 70px; {{ $ledgerMaster->image ? '' : 'display:none;' }}">
                                 <img id="imagePreview"
                                    src="{{ $ledgerMaster->image ? asset('storage/' . $ledgerMaster->image) : '' }}"
                                    alt="Image Preview"
                                    style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px;" />
                                
                              </div>
                           </div>
                                <h5 class="mt-3">📍 Address</h5>
                                @php 
                                    $addresses = is_array($ledgerMaster->address) ? $ledgerMaster->address : json_decode($ledgerMaster->address, true);
                                @endphp

                                @if(!empty($addresses))
                                    @foreach($addresses as $address)
                                        <div class="row border rounded p-2 mb-2">
                                            <div class="col-md-6">
                                                <p><strong>Billing Address:</strong> {{ $address['consignment_address'] ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Pincode:</strong> {{ $address['pincode'] ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>State:</strong> {{ $address['state'] ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Country:</strong> {{ $address['country'] ?? '-' }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Address Available</p>
                                @endif
                            </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
