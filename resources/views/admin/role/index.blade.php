@extends('admin.layouts.app')
@section('title', 'Employees | KRL')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            
            <div class="row listing-form">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>

                                <h4 class="card-title">🛞 Roles </h4>
                                
                            </div>
                            {{-- @if (hasAdminPermission('create role')) --}}
                                <a class="btn" href="{{ route('admin.role.create') }}" id="addVehicleBtn"
                                    style="background-color: #ca2639; color: white; border: none;">
                                    <i class="fas fa-plus"></i> Add Role
                                </a>
                            {{-- @endif --}}

                        </div>
                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        {{-- @if (hasAdminPermission('edit role') || hasAdminPermission('delete role') ) --}}
                                        <th width="150">Action</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr class="font-style">
                                            <td class="Role">{{ $role->name }}</td>
                                            <td class="Permission">
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge rounded p-2 m-1 px-3 bg-primary">
                                                        {{ Str::of($permission->name)->replace('_', ' ') }}
                                                    </span>
                                                @endforeach
                                            </td>
                                            {{-- @if (hasAdminPermission('edit role') || hasAdminPermission('delete role')) --}}
                                            <td class="Action">
                                                {{-- @if (hasAdminPermission('edit role')) --}}
                                                <a href="{{ route('admin.role.edit', $role->id) }}"> <button
                                                        class="btn btn-light btn-sm edit-btn">
                                                        <i class="fas fa-pen text-warning"></i>
                                                    </button></a>
                                                    {{-- @endif --}}
                                                    {{-- @if (hasAdminPermission('delete role')) --}}
                                                <button class="btn btn-sm btn-light delete-btn"><a
                                                        href="{{ route('admin.role.delete', $role->id) }}">
                                                        <i class="fas fa-trash text-danger"></i></a>
                                                </button>
                                                {{-- @endif --}}
                                            </td>
                                            {{-- @endif --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Modal -->
        </div>

    </div>
   

@endsection