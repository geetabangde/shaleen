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
                  <h4 class="card-title">🧾 Bags List</h4>
                </div>
               <a href="{{ route('admin.bags.create') }}" class="btn btn-primary waves-effect waves-light" id="addVoucherBtn">
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
                           <th>Packing</th>
                           <th>Price</th>
                           <th>Quantity</th>
                           <th>Status</th>
                           <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($bags as $key => $bag)
                     <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $bag->date }}</td>
                           <td>{{ $bag->contract_no }}</td>
                           <td>{{ $bag->buyer->name ?? '-' }}</td>
                           <td>{{ $bag->seller->name ?? '-' }}</td>
                           <td>{{ $bag->packing }}</td>
                           <td>{{ $bag->price }}</td>
                           
                           <td>{{ $bag->quantity }}</td>
                           <td>
                                 <a href="javascript:void(0);" class="badge bg-info text-white" data-bs-toggle="modal" 
                                    data-bs-target="#statusModal{{ $bag->id }}">
                                    {{ $bag->status }}
                                 </a>
                                 <!-- Modal -->
                                 <div class="modal fade" id="statusModal{{ $bag->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                             <form action="{{ route('admin.bags.Bagstatusupdate', $bag->id) }}" method="POST">
                                                @csrf
                                               
                                                <div class="modal-header">
                                                      <h5 class="modal-title">Update Status</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      <select name="status" class="form-select" required>
                                                         <option value="Await Delivery" {{ $bag->status == 'Await Delivery' ? 'selected' : '' }}>Await Delivery</option>
                                                         <option value="Delivered" {{ $bag->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
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
                              <a href="{{ route('admin.bags.edit', $bag->id) }}" class="btn btn-sm btn-light">
                                <i class="fas fa-pen text-primary"></i>
                              </a>
                              <a href="{{ route('admin.bags.view', $bag->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View">
                                 <i class="fas fa-eye text-primary"></i>
                              </a>
                              <a href="{{ route('admin.bags.delete', $bag->id) }}" 
                                 onclick="return confirm('Are you sure?')" 
                                 class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete">
                                 <i class="fas fa-trash text-danger"></i>
                              </a>
                           </td>
                     </tr>
                     @empty
                     <tr>
                           <td colspan="10" class="text-center text-muted">No bags found.</td>
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