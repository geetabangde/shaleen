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
                              <h4>👤 Vendor</h4>
                           </div>
                           <a href="{{ route('admin.ledgerMaster.index') }}" class="btn btn-primary" >
                           ⬅ Back
                           </a>
                        </div>
                        <form action="{{ route('admin.ledgerMaster.store') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="card-body">
                              <div class="row">
                                 <!-- Left Column -->
                                 <div class="col-md-6">
                                    <h5>📋 Basic Details</h5>
                                    <div class="mb-3">
                                       <label class="form-label">Vendor Name</label>
                                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                          value="{{ old('name') }}" placeholder="Enter vendor name">
                                       @error('name')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Email</label>
                                       <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                          value="{{ old('email') }}" placeholder="Enter Email">
                                       @error('email')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Password</label>
                                       <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                          placeholder="Enter Your Password">
                                       @error('password')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Contact Number</label>
                                       <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"
                                          value="{{ old('contact_number') }}" placeholder="Enter Contact Number">
                                       @error('contact_number')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">PAN Number</label>
                                       <input type="text" name="pan_number" 
                                          oninput="this.value=this.value.toUpperCase()"
                                          class="form-control @error('pan_number') is-invalid @enderror"
                                          value="{{ old('pan_number') }}" placeholder="Enter PAN number">
                                       @error('pan_number')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">TAN Number</label>
                                       <input type="text" name="tan_number" class="form-control @error('tan_number') is-invalid @enderror"
                                          value="{{ old('tan_number') }}" placeholder="Enter TAN Number">
                                       @error('tan_number')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label d-block"> Types (choose one or more)</label>
                                       <div class="d-flex flex-wrap gap-3">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="types[]" id="typeSeller" value="seller"
                                                >
                                             <label class="form-check-label" for="typeSeller">Seller</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="types[]" id="typeBuyer" value="buyer"
                                                >
                                             <label class="form-check-label" for="typeBuyer">Buyer</label>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="types[]" id="typeBroker" value="broker"
                                                >
                                             <label class="form-check-label" for="typeBroker">Broker</label>
                                          </div>
                                       </div>
                                       @error('types')
                                       <div class="text-danger small">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Profile Image</label>
                                       <input type="file" name="image" id="imageInput"
                                          class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                       @error('image') 
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="col-md-6">
                                       {{-- <label class="form-label">Preview</label> --}}
                                       <div id="imagePreviewContainer" style="position: relative; width: 70px; height: 70px; display: none;">
                                          <img id="imagePreview" src="" alt="Image Preview"
                                             style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px; padding-top: 14px;" />
                                          <button type="button" id="removeImageBtn"
                                             style="position: absolute; top: -6px; right: -6px; background: #dc3545; border: none; color: white; border-radius: 50%; width: 20px; height: 20px; line-height: 16px; font-size: 14px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                          ×
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Right Column -->
                                 <div class="col-md-6">
                                    <h5>🏦 Bank Details</h5>
                                    <div class="mb-3">
                                       <label class="form-label">Bank Name</label>
                                       <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"
                                          value="{{ old('bank_name') }}" placeholder="Enter Bank Name">
                                       @error('bank_name')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Account Number</label>
                                       <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"
                                          value="{{ old('account_number') }}" placeholder="Enter Account Number">
                                       @error('account_number')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label" for="password_confirmation">Confirm Password</label>
                                       <div class="input-group">
                                          <input id="password_confirmation" type="password" name="password_confirmation"
                                             class="form-control @error('password') is-invalid @enderror"
                                             required autocomplete="new-password">
                                       </div>
                                       @error('password')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">Account Type</label>
                                       <select name="account_type" class="form-control @error('account_type') is-invalid @enderror">
                                          <option value="">-- Select Account Type --</option>
                                          <option value="saving" {{ old('account_type')=='saving' ? 'selected' : '' }}>Saving</option>
                                          <option value="current" {{ old('account_type')=='current' ? 'selected' : '' }}>Current</option>
                                          <option value="salary" {{ old('account_type')=='salary' ? 'selected' : '' }}>Salary</option>
                                       </select>
                                       @error('account_type')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="mb-3">
                                       <label class="form-label">IFSC Code</label>
                                       <input type="text" name="ifsc_code" 
                                          oninput="this.value=this.value.toUpperCase()"
                                          class="form-control @error('ifsc_code') is-invalid @enderror"
                                          value="{{ old('ifsc_code') }}" placeholder="Enter IFSC Code">
                                       @error('ifsc_code')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <!-- Address Section -->
                                    <h5>🏠 Locations</h5>
                                    <div id="addressContainer">
                                       <div class="address-group border rounded p-3 mb-3">
                                          <div class="mb-3">
                                             <label class="form-label">Address</label>
                                             <input type="text" name="address[0][consignment_address]" class="form-control @error('address.0.consignment_address') is-invalid @enderror"
                                                value="{{ old('address.0.consignment_address') }}" placeholder="Enter  Address" required>
                                             @error('address.0.consignment_address')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                          </div>
                                          <div class="mb-3">
                                             <label class="form-label">PIN Code</label>
                                             <input type="text" name="address[0][pincode]" class="form-control @error('address.0.pincode') is-invalid @enderror"
                                                value="{{ old('address.0.pincode') }}" placeholder="Enter PIN Code" required>
                                             @error('address.0.pincode')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                          </div>
                                          <div class="mb-3">
                                             <label class="form-label">State</label>
                                             <input type="text" name="address[0][state]" class="form-control @error('address.0.state') is-invalid @enderror"
                                                value="{{ old('address.0.state') }}" placeholder="Enter State" required>
                                             @error('address.0.state')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                          </div>
                                          <div class="mb-3">
                                             <label class="form-label">Country</label>
                                             <select name="address[0][country]" class="form-control @error('address.0.country') is-invalid @enderror" required>
                                                <option value="India" selected>India</option>
                                                <option value="USA">USA</option>
                                                <option value="UK">UK</option>
                                                <option value="Canada">Canada</option>
                                             </select>
                                             @error('address.0.country')
                                             <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                          </div>
                                          <div class="text-end">
                                             <button type="button" class="btn btn-success" onclick="addAddress()">➕ Add Address</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save Vendor</button>
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
<script>
   // Image Preview + Remove
   // Image Preview + Remove
   const imageInput = document.getElementById('imageInput');
   const imagePreview = document.getElementById('imagePreview');
   const removeImageBtn = document.getElementById('removeImageBtn');
   const imagePreviewContainer = document.getElementById('imagePreviewContainer');
   
   imageInput.addEventListener('change', function () {
   const file = this.files[0];
   if (file) {
       const reader = new FileReader();
       reader.onload = function (e) {
           imagePreview.src = e.target.result;
           imagePreviewContainer.style.display = 'block'; // Show the preview box
       };
       reader.readAsDataURL(file);
   }
   });
   
   removeImageBtn.addEventListener('click', function () {
   imageInput.value = '';
   imagePreview.src = '';
   imagePreviewContainer.style.display = 'none'; // Hide everything
   });
   
   
   // Toggle Bank Details
   const toggleBankBtn = document.getElementById('toggleBankBtn');
   const bankDetails = document.getElementById('bankDetails');
   
   toggleBankBtn.addEventListener('click', function () {
       if (bankDetails.style.display === 'none' || bankDetails.style.display === '') {
           bankDetails.style.display = 'block';
           toggleBankBtn.textContent = '- Hide Bank Details';
       } else {
           bankDetails.style.display = 'none';
           toggleBankBtn.textContent = '+ Add Bank Details';
       }
   });
</script>
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