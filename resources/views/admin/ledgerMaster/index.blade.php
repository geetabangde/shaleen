@extends('admin.layouts.app')
@section('content')
<div class="page-content">
<div class="container-fluid">
   <!-- Ledger Listing Page -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="card-title">🧾Vendor List</h4>
               <a href="{{ route('admin.ledgerMaster.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add Vendor</a>
            </div>
            <div class="card-body">
               <div class="table-rep-plugin">
                  <div class="table-responsive mb-0" >
                     <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Vender Name</th>
                              <th> Vendor Type</th>
                              <th>PAN Number</th>
                              <th>TAN Number</th>
                              <th class="w-25">Address</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($ledgerMaster as $user)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $user->name }}</td>
                              <td>
                           @php
                              $types = is_string($user->types) ? json_decode($user->types, true) : $user->types;
                           @endphp

                           @if(!empty($types))
                              {{ implode(', ', $types) }}
                           @else
                              -
                           @endif
                        </td>

                              <td>{{ $user->pan_number }}</td>
                              <td>{{ $user->tan_number }}</td>
                              <td class="w-25">
                                 @php
                                 $addresses = json_decode($user->address, true);
                                 @endphp
                                 @if (!empty($addresses) && is_array($addresses))
                                    @foreach ($addresses as $address)
                                       <div class="text-wrap mb-2">
                                          <p>
                                             <strong>{{ $address['consignment_address'] ?? '' }}</strong><br>
                                             <span>
                                                Pincode: {{ $address['pincode'] ?? '' }}<br>
                                                State: {{ $address['state'] ?? '' }}<br>
                                                Country: {{ $address['country'] ?? 'India' }}
                                             </span>
                                          </p>
                                       </div>
                                    @endforeach
                                 @else
                                    <p>No Address Available</p>
                                 @endif
                              </td>
                              <td class="text-center">
                                 <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('admin.ledgerMaster.view', $user->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View">
                                       <i class="fas fa-eye text-primary"></i>
                                    </a>
                                 <a href="{{ route('admin.ledgerMaster.edit', $user->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Edit">
                                       <i class="fas fa-pen text-primary"></i>
                                 </a>
                                    <a href="{{ route('admin.ledgerMaster.delete', $user->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete">
                                       <i class="fas fa-trash text-danger"></i>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container-fluid -->
</div>
@endsection
