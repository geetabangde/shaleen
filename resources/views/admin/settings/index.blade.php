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
                  <h4 class="card-title">🧾 Settings List</h4>
                </div>
               <!-- <a href="{{ route('admin.settings.create') }}" class="btn btn-primary waves-effect waves-light" id="addVoucherBtn">
                  <i class="fas fa-plus"></i> Add
               </a> -->
            </div>
            <div class="card-body">
          <div class="table-rep-plugin">
             <div class="table-responsive mb-0" >
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>#</th>
                <th>Key</th>
                <th>Value</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($settings as $index => $setting)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $setting->key }}</td>
                    <td>{!! Str::limit($setting->value, 100) !!}</td>
                    <td>{{ $setting->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No settings found.</td>
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