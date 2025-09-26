@extends('admin.layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">📦 Dynamic Modules</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Modules</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modules Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">🧾 Modules List</h4>
                        <a href="{{ route('admin.dynamicmodules.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Module
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Module Name</th>
                                    <th>Fields Count</th>
                                    <th>Allow Edit</th>
                                    <th>Allow Delete</th>
                                    <th>Allow View</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($modules as $module)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->fields_count }}</td>
                                    <td>
                                        @if($module->allow_edit)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($module->allow_delete)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($module->allow_show)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $module->created_at->format('d M Y') }}</td>
                                    <td>
                                        {{-- <a href="" class="btn btn-sm btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}
                                        {{-- <a href="{{ route('admin.dynamicmodules.edit', $module->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a> --}}
                                        <a href="{{ route('admin.dynamicmodules.edit', $module->id) }}">
                                            <button class="btn btn-light btn-sm edit-btn" data-bs-toggle="tooltip" title="Edit modules">
                                                <i class="fas fa-pen text-warning"></i>
                                            </button>
                                        </a>
                                         <a href="{{ route('admin.dynamicmodules.delete', $module->id) }}">
                                            <button class="btn btn-sm btn-light delete-btn" data-bs-toggle="tooltip" title="Delete modules">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No modules found.</td>
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

<!-- DataTables JS (Optional) -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            order: [[0, 'asc']]
        });
    });
</script>
@endpush
@endsection