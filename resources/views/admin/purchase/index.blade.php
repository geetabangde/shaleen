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
                  <h4 class="card-title">🧾 Raw Material List</h4>
                </div>
               <a href="{{ route('admin.purchase.create') }}" class="btn btn-primary waves-effect waves-light" id="addVoucherBtn">
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
                            <th>Date</th>
                            <th>Contract No.</th>
                            <th>Buyer</th>
                            <th>Seller</th>
                            <th>Commodity</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($purchases as $key => $purchase)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $purchase->raw_date }}</td>
                            <td>{{ $purchase->raw_contract_no }}</td>
                            <td>{{ $purchase->buyer->name ?? '-' }}</td>
                            <td> {{$purchase->seller->name ?? '-' }} </td>
                            <td>{{ $purchase->raw_commodity }}</td>
                            <td>{{ $purchase->raw_price }}</td>
                            <td>{{ $purchase->raw_quantity }} Kg</td>
                            <td>
                                 <a href="javascript:void(0);" class="badge bg-info text-white" data-bs-toggle="modal" 
                                    data-bs-target="#statusModal{{ $purchase->id }}">
                                    {{ $purchase->status }}
                                 </a>

                                 <!-- Modal -->
                                 <div class="modal fade" id="statusModal{{ $purchase->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                             <form action="{{ route('admin.purchase.statusupdate', $purchase->id) }}" method="POST">
                                                @csrf
                                               
                                                <div class="modal-header">
                                                      <h5 class="modal-title">Update Status</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      <select name="status" class="form-select" required>
                                                        
                                                         <option value="Await Delivery" {{ $purchase->status == 'Await Delivery' ? 'selected' : '' }}>Await Delivery</option>
                                                         <option value="Delivered" {{ $purchase->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                        
                                                      </select>
                                                </div>
                                                <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Save Status</button>
                                                </div>
                                             </form>
                                          </div>
                                    </div>
                                 </div>
                              </td>

                            <td>
                                <a href="{{ route('admin.purchase.edit', $purchase->id) }}" class="btn btn-sm btn-light">
                                   <i class="fas fa-pen text-primary"></i>
                                </a>
                                 <a href="{{ route('admin.purchase.view', $purchase->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye text-primary"></i>
                                 </a>
                                 <a href="{{ route('admin.purchase.delete', $purchase->id) }}"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash text-danger"></i>
                                 </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No purchases found.</td>
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