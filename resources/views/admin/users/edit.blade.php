@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row ledger-add-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>✏️ Edit User</h4>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">⬅ Back</a>
                    </div>

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="card-body p-4">
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Contact -->
                                <div class="col-md-6">
                                    <label class="form-label">Contact Number</label>
                                    <input type="number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"
                                           value="{{ old('contact_number', $user->contact_number) }}" required>
                                    @error('contact_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                    <!-- Department -->
                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <select name="department" class="form-control @error('department') is-invalid @enderror" required>
                                        <option value="">Select Department</option>
                                        @foreach(['Sales', 'HR', 'IT', 'Finance'] as $dept)
                                            <option value="{{ $dept }}" {{ old('department', $user->department) == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                                        @endforeach
                                    </select>
                                    @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Password <small class="text-muted">(Leave blank to keep current)</small></label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

                            

                                <!-- Role -->
                                <div class="col-md-6">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="">Select Role</option>
                                        @foreach(['Admin', 'Manager', 'Employee', 'Viewer'] as $role)
                                            <option value="{{ $role }}" {{ old('role', $user->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Image -->
                                <div class="col-md-6">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="image" id="imageInput" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Preview -->
                                <div class="col-md-6">
                                    <div id="imagePreviewContainer"
                                         style="position: relative; width: 70px; height: 70px; {{ $user->image ? '' : 'display:none;' }}">
                                        <img id="imagePreview"
                                             src="{{ $user->image ? asset('storage/' . $user->image) : '' }}"
                                             alt="Image Preview"
                                             style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px;" />
                                        <button type="button" id="removeImageBtn"
                                                style="position: absolute; top: -6px; right: -6px; background: #dc3545; border: none; color: white; border-radius: 50%; width: 20px; height: 20px; line-height: 16px; font-size: 14px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                            ×
                                        </button>
                                    </div>
                                </div>

                                <!-- Bank Details (always visible) -->
                                <div class="col-md-6">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"
                                           value="{{ old('bank_name', $user->bank_name) }}">
                                    @error('bank_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"
                                           value="{{ old('account_number', $user->account_number) }}">
                                    @error('account_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">IFSC Code</label>
                                    <input type="text" name="ifsc" class="form-control @error('ifsc') is-invalid @enderror"
                                           value="{{ old('ifsc', $user->ifsc_code) }}" oninput="this.value = this.value.toUpperCase()" >
                                    @error('ifsc') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Account Type</label>
                                    <select name="account_type" class="form-control @error('account_type') is-invalid @enderror">
                                        <option value="">Select Account Type</option>
                                        @foreach(['Saving', 'Salary', 'Current', 'Other'] as $type)
                                            <option value="{{ $type }}" {{ old('account_type', $user->account_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('account_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Submit -->
                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success">Update User</button>
                                </div>
                            </div> <!-- .row -->
                        </div> <!-- .card-body -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Image preview script --}}
<script>
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
                imagePreviewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    removeImageBtn.addEventListener('click', function () {
        imageInput.value = '';
        imagePreview.src = '';
        imagePreviewContainer.style.display = 'none';
    });
</script>
@endsection
