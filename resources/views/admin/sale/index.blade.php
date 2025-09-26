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
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sales </h4>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Sales</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
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
                  <div class="table-responsive mb-0" data-pattern="priority-columns">
                     <table id="" class="table table-bordered dt-responsive nowrap w-100">
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
                              <td>{{ $sale->item }}</td>
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
                                    <table class="table table-bordered table-striped mb-0" id="datatable-buttons">
                                       <thead class="table-light">
                                          <tr>
                                             <th>#</th>
                                             <th>Sub Order</th>
                                             <th>Quantity</th>
                                             <th>Rate</th>
                                             <th>Amount</th>
                                             <th>Status</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>1</td>
                                             <td>SO-001</td>
                                             <td>100 KG</td>
                                             <td>₹50/KG</td>
                                             <td>₹5,000</td>
                                             <td><span class="badge bg-success">Completed</span></td>
                                          </tr>
                                          <tr>
                                             <td>2</td>
                                             <td>SO-002</td>
                                             <td>50 KG</td>
                                             <td>₹55/KG</td>
                                             <td>₹2,750</td>
                                             <td><span class="badge bg-warning">Pending</span></td>
                                          </tr>
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

// DataTables configuration with proper settings
$(document).ready(function() {
    $('#datatable-buttons').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true,
        columnDefs: [
            {
                targets: [0], // Expand column
                orderable: false,
                searchable: false
            },
            {
                targets: [-1], // Actions column
                orderable: false,
                searchable: false
            }
        ],
        order: [[1, 'asc']], // Order by serial number
        pageLength: 25,
        language: {
            search: "Search Sales:",
            lengthMenu: "Show _MENU_ entries per page",
            info: "Showing _START_ to _END_ of _TOTAL_ sales",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

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