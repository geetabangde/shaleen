@extends('admin.layouts.app')
@section('content')
<style>
   .expand-icon {
      cursor: pointer;
      transition: transform 0.3s ease;
      display: inline-block;
      font-size: 12px;
      margin-right: 5px;
   }
   .expand-icon.expanded {
      transform: rotate(90deg);
   }
   .order-id-link {
      text-decoration: none;
      color: #050505ff;
   }
   .order-id-link:hover {
      text-decoration: underline;
   }
   .nested-table-container {
      background-color: #f8f9fa;
      border-radius: 5px;
   }
   .expand-btn {
      border: none;
      background: none;
      padding: 0;
      cursor: pointer;
   }
</style>

<div class="page-content">
<div class="container-fluid">
   
   <!-- Ledger Listing Page -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="card-title">🧾Sales List</h4>
               <a href="{{ route('admin.sale.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add Sale</a>
            </div>
            <div class="card-body">
               <div class="table-rep-plugin">
                  <div class="table-responsive mb-0" >
                     <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Date</th>
                              <th>Order ID</th>
                              <th>Broker Name</th>
                              <th>Party Name</th>
                              <th>Item</th>
                              <th>Quantity</th>
                              <th>Brand</th>
                              <th>Pending Balance</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                        @forelse($sales as $sale)
                           <tr>
                                 <td> <button class="expand-btn text-center" data-bs-toggle="collapse" data-bs-target="#nestedTable{{ $sale->id }}" aria-expanded="false" aria-controls="nestedTable{{ $sale->id }}" onclick="toggleArrow(this)">
                                    <i class="fas fa-chevron-right expand-icon" id="arrow{{ $sale->id }}"></i>
                                 </button>{{ $loop->iteration }}</td>
                              <td>{{ $sale->date->format('Y-m-d') }}</td>
                              <td>{{ $sale->sales_order_id }}</td>
                              <td>{{ $sale->broker->name ?? $sale->broker_name ?? '-' }}</td>
                              <td>{{ $sale->partyname->name ?? $sale->party_name ?? '-' }}</td>
                              <td>{{ $sale->itemMaster->item_name ?? $sale->item }}</td> <!-- Display item -->
                              <td>{{ $sale->quantity }}</td>
                              <td>{{ $sale->brand }}</td>
                              <td>{{ $sale->loading_history_pending_balance }}</td>
                              <td>
                                 <a href="{{ route('admin.sale.edit', $sale->id) }}" class="btn btn-sm btn-light"><i class="fas fa-pen text-primary"></i></a>
                                 <a href="{{ route('admin.sale.view', $sale->id) }}" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="View"><i class="fas fa-eye text-primary"></i></a>
                                 <a href="{{ route('admin.sale.delete', $sale->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-light" data-bs-toggle="tooltip" title="Delete"><i class="fas fa-trash text-danger"></i></a>
                                 
                              </td>
                           </tr>
                          
                           <tr class="collapse" id="nestedTable{{ $sale->id }}">
                              <td colspan="11">
                                 <div class="p-3 nested-table-container">
                                       <h6 class="mb-3">Order Details for {{ $sale->sales_order_id }}</h6>
                                       <table class="table table-bordered table-striped mb-0">
                                          <thead class="table-light">
                                             <tr>
                                                   <th>#</th>
                                                   <th>Sub Order Id</th>
                                                   <th>Quantity</th>
                                                   <th>Sale Price</th>
                                                   <th>Invoice No</th>
                                                   <th>Invoice Date</th>
                                                   <th>Quantity</th>
                                                   <th>Sale Price</th>
                                                   <th>Unit</th>
                                                   <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @forelse($sale->subSales as $subSale)
                                                   <tr>
                                                      <td>{{ $loop->iteration }}</td>
                                                      <td>SO-{{ $sale->id }}-{{ $subSale->id }}</td>
                                                      <td>{{ $subSale->quantity }}</td>
                                                      <td>₹{{ number_format($subSale->sale_price, 2) }}</td>
                                                       <td>{{ $subSale->invoice_no }}</td>
                                                         <td>{{ $subSale->invoice_date }}</td>
                                                         <td>{{ $subSale->quantity }}</td>
                                                         <td>{{ $subSale->sale_price }}</td>
                                                         <td>{{ $subSale->unit }}</td>
                                                         <td>
                                                            
                                                            <a href="{{ route('admin.sale.invoice', [$sale->id, $subSale->id]) }}" 
                                                               target="_blank" 
                                                               class="btn btn-sm btn-info">Invoice</a>
                                                         </td>
                                                   </tr>
                                             @empty
                                                   <tr>
                                                      <td colspan="4" class="text-center text-muted">No Sub-Sales found</td>
                                                   </tr>
                                             @endforelse
                                          </tbody>
                                       </table>
                                 </div>
                              </td>
                           </tr>
                        @empty
                           <tr>
                              <td colspan="11" class="text-center text-muted">No sales found.</td>
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

<script>
function toggleArrow(element) {
    const arrow = element.querySelector('.expand-icon');
    const isExpanded = arrow.classList.contains('expanded');
    
    if (isExpanded) {
        arrow.classList.remove('expanded');
        arrow.classList.remove('fa-chevron-down');
        arrow.classList.add('fa-chevron-right');
    } else {
        arrow.classList.add('expanded');
        arrow.classList.remove('fa-chevron-right');
        arrow.classList.add('fa-chevron-down');
    }
}



// Bootstrap collapse events
document.addEventListener('DOMContentLoaded', function() {
    const collapseElements = document.querySelectorAll('[data-bs-toggle="collapse"]');
    
    collapseElements.forEach(function(element) {
        const target = element.getAttribute('data-bs-target');
        const targetElement = document.querySelector(target);
        
        if (targetElement) {
            targetElement.addEventListener('show.bs.collapse', function() {
                const arrow = element.querySelector('.expand-icon');
                if (arrow) {
                    arrow.classList.add('expanded');
                    arrow.classList.remove('fa-chevron-right');
                    arrow.classList.add('fa-chevron-down');
                }
            });
            
            targetElement.addEventListener('hide.bs.collapse', function() {
                const arrow = element.querySelector('.expand-icon');
                if (arrow) {
                    arrow.classList.remove('expanded');
                    arrow.classList.remove('fa-chevron-down');
                    arrow.classList.add('fa-chevron-right');
                }
            });
        }
    });
});
</script>
@endsection

