@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                    <h4>👤 Add User</h4>

                  </div>
                  <a href="{{ route('admin.users.index') }}" class="btn btn-primary" >
                     ⬅ Back
                  </a>
               </div>
              <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number</label>
                                <input type="number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"
                                    value="{{ old('contact_number') }}" required>
                                @error('contact_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="">Select Role</option>
                                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Manager" {{ old('role') == 'Manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="Employee" {{ old('role') == 'Employee' ? 'selected' : '' }}>Employee</option>
                                    <option value="Viewer" {{ old('role') == 'Viewer' ? 'selected' : '' }}>Viewer</option>
                                </select>
                                @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <!-- Password -->
                           
                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="new-password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                       

                            <!-- Department -->
                           <div class="col-md-6">
                                <label class="form-label">Department</label>
                                <select name="department" class="form-control @error('department') is-invalid @enderror" required>
                                    <option value="">Select Department</option>
                                    <option value="Sales" {{ old('department') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                    <option value="HR" {{ old('department') == 'HR' ? 'selected' : '' }}>HR</option>
                                    <option value="IT" {{ old('department') == 'IT' ? 'selected' : '' }}>IT</option>
                                    <option value="Finance" {{ old('department') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                </select>
                                @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>


                            <!-- Role -->
                           


                            <!-- Image Upload -->
                            <div class="col-md-6">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="image" id="imageInput"
                                    class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <!-- Image Preview -->

                           <div class="col-md-6">
                                {{-- <label class="form-label">Preview</label> --}}
                                <div id="imagePreviewContainer" style="position: relative; width: 70px; height: 70px; display: none;">
                                    <img id="imagePreview" src="" alt="Image Preview"
                                        style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px;" />
                                    <button type="button" id="removeImageBtn"
                                        style="position: absolute; top: -6px; right: -6px; background: #dc3545; border: none; color: white; border-radius: 50%; width: 20px; height: 20px; line-height: 16px; font-size: 14px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                        ×
                                    </button>
                                </div>
                            </div>



                            <!-- Bank Details Toggle -->
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-secondary" id="toggleBankBtn">+ Add Bank Details</button>
                            </div>

                           
                                <div id="bankDetails" style="display: none;">
                                    <div class="row g-3 mt-2">
                                        <div class="col-md-6">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"
                                                value="{{ old('bank_name') }}">
                                            @error('bank_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Account Number</label>
                                            <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"
                                                value="{{ old('account_number') }}">
                                            @error('account_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">IFSC Code</label>
                                            <input type="text" name="ifsc" class="form-control @error('ifsc') is-invalid @enderror"
                                                value="{{ old('ifsc') }}" oninput="this.value = this.value.toUpperCase()">
                                            @error('ifsc') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Account Type</label>
                                            <select name="account_type" class="form-control @error('account_type') is-invalid @enderror" >
                                                <option value="">Select Account Type</option>
                                                <option value="Saving" {{ old('account_type') == 'Saving' ? 'selected' : '' }}>Saving</option>
                                                <option value="Salary" {{ old('account_type') == 'Salary' ? 'selected' : '' }}>Salary</option>
                                                <option value="Current" {{ old('account_type') == 'Current' ? 'selected' : '' }}>Current</option>
                                                <option value="Other" {{ old('account_type') == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                            @error('account_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>


                            <!-- Submit -->
                            <div class="col-12 text-end mt-3">
                                <button type="submit" name="submit" class="btn btn-primary">Save User</button>
                            </div>
                        </div>
                    </div>
                </form>

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

@endsection