@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- View User Details Page -->
        <div class="view-user-form">
            {{-- @dd($user); --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>User Details View</h4>
                        <p class="mb-0">View details for the user.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary" id="backToListBtn"
                      >
                        ⬅ Back to Listing
                    </a>
                </div>
                <div class="card-body">
                    <h4>👨‍💼 User Details</h4>

                    <div class="row mb-2">
                        <div class="col-md-4"><strong>👤 Name:</strong>{{ $user->name }} </div>
                        <div class="col-md-4"><strong>📧 Email:</strong> {{ $user->email }}</div>
                        <div class="col-md-4"><strong>📞 Contact Number:</strong> {{ $user->contact_number }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4"><strong>🏢 Department:</strong> {{ $user->department }}</div>
                        <div class="col-md-4"><strong>🛡️ Role:</strong> {{ ucfirst($user->role) }}</div>
                        <div class="col-md-4"><strong>🔐 Account Type:</strong> {{ ucfirst($user->account_type) }}</div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-4"><strong>🏦 Bank Name:</strong> {{ $user->bank_name }}</div>
                        <div class="col-md-4"><strong>💳 Account Number:</strong> {{ $user->account_number }}</div>
                        <div class="col-md-4"><strong>🔢 IFSC Code:</strong> {{ $user->ifsc_code }}</div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
