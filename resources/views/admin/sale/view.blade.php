@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               
               <div class="card-body">
                  <div class="row view-form">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between align-items-center">
                              <div>
                                 <h4>👤 View Vendor Details</h4>
                                 <p>Review the details of the selected customer.</p>
                              </div>
                              <a href="{{ route('admin.sale.index') }}" 
                                 class="btn btn-primary" 
                                 >
                                 ⬅ Back to Listing
                              </a>
                           </div>
                           <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $sale->date->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>Sales Order ID</th>
                                    <td>{{ $sale->sales_order_id }}</td>
                                </tr>
                                <tr>
                                    <th>Broker Name</th>
                                    <td>{{ $sale->broker->name ?? $sale->broker_name }}</td>
                                </tr>
                                <tr>
                                    <th>Party Name</th>
                                    <td>{{ $sale->partyname->name ?? $sale->party_name }}</td>
                                </tr>
                                <tr>
                                    <th>Item</th>
                                    <td>{{ $sale->item }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $sale->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Bags</th>
                                    <td>{{ $sale->beg->marking ?? $sale->bags }}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $sale->brand }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $sale->price }}</td>
                                </tr>
                                <tr>
                                    <th>Remark</th>
                                    <td>{{ $sale->remark }}</td>
                                </tr>
                                <tr>
                                    <th>Pending Balance</th>
                                    <td>{{ $sale->loading_history_pending_balance }}</td>
                                </tr>
                            </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
