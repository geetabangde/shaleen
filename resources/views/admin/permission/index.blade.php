@extends('admin.layouts.app')
@section('title', 'Employees | KRL')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
       
            <!-- end page title -->
            <!-- Tyre Listing Page -->
            <div class="row listing-form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">🛞 Permissions</h4>
                               
                            </div>
                            {{-- @if (hasAdminPermission('create permissions')) --}}
                            <a class="btn btn-primary" href="{{ route('admin.permissions.create') }}" id="addVehicleBtn"
                            >
                                <i class="fas fa-plus"></i> Add Permission
                            </a>
                           
                            {{-- @endif --}}
                        </div>
                        <div class="card-body">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>Permission</th>
                                        {{-- @if (hasAdminPermission('edit permissions') || hasAdminPermission('delete permissions')) --}}
                                        <th>Action</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        {{-- @if (hasAdminPermission('edit permissions') || hasAdminPermission('delete permissions')) --}}
                                        <td class="action">
                                            {{-- @if (hasAdminPermission('edit permissions')) --}}
                                            <a href="">
                                                <button class="btn btn-light btn-sm edit-btn">
                                                    <i class="fas fa-pen text-warning"></i>
                                                </button>
                                            </a>
                                            {{-- @endif --}}
                                            {{-- @if (hasAdminPermission('delete permissions')) --}}
                                            <button class="btn btn-sm btn-light delete-btn">
                                                <a href="">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
                                            </button>
                                            {{-- @endif --}}
                                        </td>
                                        {{-- @endif --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-4">
                                {{ $permissions->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Modal -->
        </div>
    </div>
@endsection