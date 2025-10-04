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
                  <h4 class="card-title">🧾 Sale Contract List</h4>
                </div>
               <a href="{{ route('admin.saleContracts.create') }}" class="btn btn-primary waves-effect waves-light" id="addVoucherBtn">
                  <i class="fas fa-plus"></i> Add
               </a>
            </div>
            <div class="card-body">
          <div class="table-rep-plugin">
             <div class="table-responsive mb-0" >
                 <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Contract No</th>
                          <th>Contract Date</th>
                          <th>Buyer</th>
                          <th>Seller</th>
                          <th>Commodity</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total Value</th>
                          <th>Documents</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($saleContracts as $contract)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $contract->contract_no }}</td>
                              <td>{{ $contract->contract_date }}</td>
                              <td>{{ optional($contract->buyer)->name ?? $contract->buyer_name }}</td>
                              <td>{{ optional($contract->seller)->name ?? $contract->seller_name }}</td>
                              <td>{{ $contract->commodity }}</td>
                              <td>{{ $contract->price }}</td>
                              <td>{{ $contract->quantity }}</td>
                              <td>{{ $contract->total_value }}</td>
                             <td>
                                @if($contract->documents)
                                    @php $docs = json_decode($contract->documents, true); @endphp
                                    <ul>
                                        @foreach($docs as $doc)
                                            <li>
                                                <a href="{{ $doc['file'] ?? '#' }}" target="_blank">{{ $doc['name'] ?? 'View' }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>

                              <td>
                                  <a href="{{ route('admin.saleContracts.edit', $contract->id) }}" class="btn btn-sm btn-light"><i class="fas fa-pen text-primary"></i></a>
                                  <a href="{{ route('admin.saleContracts.view', $contract->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye text-primary"></i>
                                 </a>
                                  <a href="{{ route('admin.saleContracts.delete', $contract->id) }}"  onclick="return confirm('Are you sure?')" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash text-danger"></i>
                                 </a>
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
</div>
@endsection