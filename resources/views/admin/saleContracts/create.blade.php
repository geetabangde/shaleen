@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div><h4>🌾 Contract List</h4></div>
                  <a href="{{ route('admin.saleContracts.index') }}" class="btn btn-primary" >
                     ⬅ Back
                  </a>
               </div>
               <form action="{{ route('admin.saleContracts.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                     <div class="row g-3">
                        <div class="col-md-4">
                           <label for="contract_no" class="form-label">Contract No <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="contract_no" name="contract_no" value="{{ old('contract_no') }}" required>
                           @error('contract_no')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="col-md-4">
                           <label for="contract_date" class="form-label">Contract Date <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" id="contract_date" name="contract_date" value="{{ old('contract_date') }}" required>
                           @error('contract_date')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="col-md-4">
                           <label for="buyer_name" class="form-label">Buyer Name <span class="text-danger">*</span></label>
                           <select name="buyer_name" class="form-control @error('buyer_name') is-invalid @enderror" required>
                                 <option value="">Select Buyer</option>
                                 @foreach($buyers as $ledger)
                                    <option value="{{ $ledger->id }}" {{ old('buyer_name') == $ledger->id ? 'selected' : '' }}>{{ $ledger->name }}</option>
                                 @endforeach
                              </select>
                        </div>
                        <div class="col-md-4">
                           <label for="seller_name" class="form-label">Seller Name <span class="text-danger">*</span></label>
                              <select name="seller_name" class="form-control @error('seller_name') is-invalid @enderror" required>
                                 <option value="">Select Seller</option>
                                 @foreach($sellers as $ledger)
                                    <option value="{{ $ledger->id }}" {{ old('seller_name') == $ledger->id ? 'selected' : '' }}>{{ $ledger->name }}</option>
                                 @endforeach
                              </select>
                              @error('seller_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <!-- commodity -->
                        <div class="col-md-4">
                           <label for="commodity" class="form-label">Commodity <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="commodity" name="commodity" value="{{ old('commodity') }}" required>
                           @error('commodity')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- packing -->
                        <div class="col-md-4">
                           <label for="packing" class="form-label">Packing <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="packing" name="packing" value="{{ old('packing') }}" required>
                           @error('packing')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- shipment_date -->
                        <div class="col-md-4">
                           <label for="shipment" class="form-label">Shipment <span class="text-danger">*</span></label>
                           <input type="date" class="form-control" id="shipment_date" name="shipment_date" value="{{ old('shipment_date') }}" required>
                           @error('shipment')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- price -->
                        <div class="col-md-4">
                           <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                           <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                           @error('price')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- quantity -->
                        <div class="col-md-4">
                           <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                           <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                           @error('quantity')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- payment teram -->
                        <div class="col-md-4">
                           <label for="payment_terms" class="form-label">Payment Term <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="payment_terms" name="payment_terms" value="{{ old('payment_terms') }}" required>
                           @error('payment_terms')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- seller_bank_details -->
                        <div class="col-md-4">
                           <label for="seller_bank_details" class="form-label">Seller Bank Details <span class="text-danger">*</span></label>
                           <textarea class="form-control" id="seller_bank_details" name="seller_bank_details" rows="1" required>{{ old('seller_bank_details') }}</textarea>
                           @error('seller_bank_details')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="col-md-4">
                           <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                              <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                              <option value="pending">Pending</option>
                              <option value="approved">Approved</option>
                              <option value="rejected">Rejected</option>
                           </select>
                        </div>

                        <!-- documents table -->
                        <div class="col-md-12">
                           <label class="form-label">Documents <span class="text-danger">*</span></label>
                           <table class="table table-bordered" id="documents_table">
                              <thead>
                                 <tr>
                                       <th>Document Name</th>
                                       <th>Upload Document</th>
                                       <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php
                                       $defaultDocs = [
                                          '1 Original Invoices',
                                          '3/3 Bill of lading:',
                                          '1 Origine Certificate.',
                                          '1 Phytosanitary Certificate',
                                          '1 Packing List',
                                          '1 Fumigation Certificate',
                                          'Weight & Quality Certificate',
                                          'Conformity Certificate'
                                       ];
                                 @endphp

                                 @foreach($defaultDocs as $docName)
                                 <tr>
                                       <td>
                                          <input type="text" name="document_names[]" class="form-control" value="{{ $docName }}" required>
                                       </td>
                                       <td>
                                          <input type="file" name="documents[]" class="form-control" required>
                                       </td>
                                       <td>
                                          <!-- Empty column, action button below -->
                                       </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>

                           <!-- Add More button below the table -->
                           <button type="button" class="btn btn-success" id="add_document_btn">➕ Add More</button>

                           @error('documents')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                           @error('documents.*')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                           @error('document_names.*')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <!-- Terms and Conditions -->
                        <!-- <div class="col-md-12">
                           <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                           <textarea class="form-control" id="terms_conditions" name="terms_conditions" rows="4">{{ old('terms_conditions') }}</textarea>
                           @error('terms_conditions')
                           <div class="text-danger">{{ $message }}</div>
                           @enderror
                        </div> -->
                        <div class="col-md-12">
                           <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                           <textarea class="form-control" id="terms_conditions" name="terms_conditions" rows="6">
                              {{ old('terms_conditions', $termsValue) }}
                           </textarea>
                        </div>

                     </div>
                  </div>
                  <div class="card-footer text-end">
                     <button type="submit" class="btn btn-success">Save</button>
                  </div> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    // CKEditor initialize
    ClassicEditor
        .create(document.querySelector('#terms_conditions'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.getElementById('documents_table').getElementsByTagName('tbody')[0];
    const addBtn = document.getElementById('add_document_btn');

    addBtn.addEventListener('click', function() {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <input type="text" name="document_names[]" class="form-control" placeholder="Document Name" required>
            </td>
            <td>
                <input type="file" name="documents[]" class="form-control" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger removeRow">❌ Remove</button>
            </td>
        `;
        tableBody.appendChild(newRow);
    });

    // Remove dynamically added rows
    tableBody.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('removeRow')) {
            e.target.closest('tr').remove();
        }
    });
});
</script>
@endsection