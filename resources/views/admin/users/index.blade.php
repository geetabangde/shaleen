@extends('admin.layouts.app')
@section('content')
<div class="page-content">
<div class="container-fluid">
   <!-- Purchase Listing Page -->
   <div class="row listing-form">
      <div class="col-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="card-title">🧾 Users List</h4>
                </div>
               <a href="{{ route('admin.users.create') }}" class="btn btn-primary waves-effect waves-light" id="addVoucherBtn">
                  <i class="fas fa-plus"></i> Add
               </a>
            </div>
            <div class="card-body">
            <div class="table-rep-plugin">
             <div class="table-responsive mb-0" >
                 <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                  <thead>
                               <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>IFSC</th>
                                    <th>Account Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>

                                    </thead>
                                    <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact_number }}</td>
                                        <td>{{ $user->department }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->bank_name ?? '-' }}</td>
                                        <td>{{ $user->account_number ?? '-' }}</td>
                                        <td>{{ $user->ifsc_code ?? '-' }}</td>
                                        <td>{{ $user->account_type ?? '-' }}</td>
                                        {{-- <td>{{ $user->status ?? '-' }}</td> --}}
                                        <td>
                                            <a href="{{ route('admin.users.toggleStatus', $user->id) }}"
                                            class="btn btn-sm {{ $user->status ? 'btn-success' : 'btn-danger' }}">
                                            {{ $user->status ? 'Active' : 'Inactive' }}
                                            </a>
                                        </td>
                                      
                                         <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-light">
                                            <i class="fas fa-pen text-primary"></i>
                                            </a>
                                            <a href="{{ route('admin.users.view', $user->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="{{ route('admin.users.delete', $user->id) }}"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
               </table>
             </div>
            </div>
            

            </div>
         </div>
      </div>
   </div>
</div>
@endsection