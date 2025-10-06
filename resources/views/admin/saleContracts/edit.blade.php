@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>🌾 Edit Raw Material</h4>
                  </div>
                  <a href="{{ route('admin.saleContracts.index') }}" class="btn btn-primary" >
                     ⬅ Back
                  </a>
               </div>

                  <form action="{{ route('admin.saleContracts.update', $saleContract->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                              <div class="row g-3">
                                    <!-- Contract No -->
                                    <div class="col-md-4">
                                    <label for="contract_no" class="form-label">Contract No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contract_no" name="contract_no" 
                                          value="{{ old('contract_no', $saleContract->contract_no) }}" required>
                                    @error('contract_no')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Contract Date -->
                                    <div class="col-md-4">
                                    <label for="contract_date" class="form-label">Contract Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="contract_date" name="contract_date" 
                                          value="{{ old('contract_date', $saleContract->contract_date) }}" required>
                                    @error('contract_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Buyer Name -->
                                    <div class="col-md-4">
                                    <label for="buyer_name" class="form-label">Buyer Name <span class="text-danger">*</span></label>
                                    <select name="buyer_name" class="form-control @error('buyer_name') is-invalid @enderror" required>
                                          <option value="">Select Buyer</option>
                                          @foreach($buyers as $ledger)
                                                <option value="{{ $ledger->id }}" 
                                                {{ old('buyer_name', $saleContract->buyer_name) == $ledger->id ? 'selected' : '' }}>
                                                {{ $ledger->name }}
                                                </option>
                                          @endforeach
                                    </select>
                                    @error('buyer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Seller Name -->
                                    <div class="col-md-4">
                                    <label for="seller_name" class="form-label">Seller Name <span class="text-danger">*</span></label>
                                    <select name="seller_name" class="form-control @error('seller_name') is-invalid @enderror" required>
                                          <option value="">Select Seller</option>
                                          @foreach($sellers as $ledger)
                                                <option value="{{ $ledger->id }}" 
                                                {{ old('seller_name', $saleContract->seller_name) == $ledger->id ? 'selected' : '' }}>
                                                {{ $ledger->name }}
                                                </option>
                                          @endforeach
                                    </select>
                                    @error('seller_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Commodity -->
                                    <div class="col-md-4">
                                    <label for="commodity" class="form-label">Commodity <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="commodity" name="commodity" 
                                          value="{{ old('commodity', $saleContract->commodity) }}" required>
                                    @error('commodity')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Packing -->
                                    <div class="col-md-4">
                                    <label for="packing" class="form-label">Packing <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="packing" name="packing" 
                                          value="{{ old('packing', $saleContract->packing) }}" required>
                                    @error('packing')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Shipment Date -->
                                    <div class="col-md-4">
                                    <label for="shipment_date" class="form-label">Shipment <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="shipment_date" name="shipment_date" 
                                          value="{{ old('shipment_date', $saleContract->shipment_date) }}" required>
                                    @error('shipment_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-4">
                                    <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" 
                                          value="{{ old('price', $saleContract->price) }}" required>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-md-4">
                                    <label for="quantity" class="form-label">Quantity <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" 
                                          value="{{ old('quantity', $saleContract->quantity) }}" required>
                                    @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Payment Terms -->
                                    <div class="col-md-4">
                                    <label for="payment_terms" class="form-label">Payment Term <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="payment_terms" name="payment_terms" 
                                          value="{{ old('payment_terms', $saleContract->payment_terms) }}" required>
                                    @error('payment_terms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <!-- Seller Bank Details -->
                                    <div class="col-md-4">
                                    <label for="seller_bank_details" class="form-label">Seller Bank Details <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="seller_bank_details" name="seller_bank_details" rows="1" required>{{ old('seller_bank_details', $saleContract->seller_bank_details) }}</textarea>
                                    @error('seller_bank_details')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-4">
                                          <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                          <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                                <option value="pending" {{ $saleContract->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="approved" {{ $saleContract->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                <option value="rejected" {{ $saleContract->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                          </select>
                                    </div>
                                    <!-- Documents Section -->
                              <div class="col-md-12">
                              <label class="form-label">Documents</label>

                              <table class="table table-bordered" id="documents_table">
                                    <thead>
                                          <tr>
                                          <th>Document Name</th>
                                          <th>Upload / View</th>
                                          <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <!-- Existing documents -->
                                          @if($saleContract->documents)
                                          @php $existingDocs = json_decode($saleContract->documents, true); @endphp
                                          @foreach($existingDocs as $doc)
                                                <tr>
                                                      <td>
                                                      <input type="text" name="document_names[]" class="form-control" 
                                                            value="{{ $doc['name'] ?? '' }}" readonly>
                                                      </td>
                                                      <td>
                                                      <a href="{{ $doc['file'] ?? '#' }}" target="_blank" class="btn btn-primary">View</a>
                                                      </td>
                                                      <td>
                                                      <!-- Optionally, you can allow deletion -->
                                                      <button type="button" class="btn btn-danger removeRow">❌ Remove</button>
                                                      </td>
                                                </tr>
                                          @endforeach
                                          @endif

                                          <!-- Initial empty row for new documents -->
                                          <tr>
                                          <td>
                                                <input type="text" name="document_names[]" class="form-control" placeholder="Document Name">
                                          </td>
                                          <td>
                                                <input type="file" name="documents[]" class="form-control">
                                          </td>
                                          <td>
                                                <button type="button" class="btn btn-success addRow">➕ Add More</button>
                                          </td>
                                          </tr>
                                    </tbody>
                              </table>

                              @error('documents.*')
                                    <div class="text-danger">{{ $message }}</div>
                              @enderror
                              @error('document_names.*')
                                    <div class="text-danger">{{ $message }}</div>
                              @enderror
                              </div>
                              <!-- End Documents Section -->                                                      

                                    <!-- Terms & Conditions (CKEditor) -->
                                    <div class="col-md-12">
                                    <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                                    <textarea class="form-control" id="terms_conditions" name="terms_conditions" rows="6">{{ old('terms_conditions', $termsValue) }}</textarea>

                                    <!-- <textarea class="form-control" id="terms_conditions" name="terms_conditions" rows="4">{{ old('terms_conditions', $saleContract->terms_conditions) }}</textarea> -->
                                    @error('terms_conditions')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                              </div>
                        </div>

                        <div class="card-footer text-end">
                              <button type="submit" class="btn btn-success">Update</button>
                        </div>
                  </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#terms_conditions')).catch(error => console.error(error));
</script>
<!-- JS for Add/Remove Rows -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('documents_table').getElementsByTagName('tbody')[0];

        // Add new row
        table.addEventListener('click', function(e) {
            if(e.target && e.target.classList.contains('addRow')) {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><input type="text" name="document_names[]" class="form-control" placeholder="Document Name"></td>
                    <td><input type="file" name="documents[]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger removeRow">❌ Remove</button></td>
                `;
                table.appendChild(newRow);
            }

            // Remove row
            if(e.target && e.target.classList.contains('removeRow')) {
                e.target.closest('tr').remove();
            }
        });
    });
</script>
@endsection