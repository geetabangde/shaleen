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
                                 <p>Review the details of the selected customer.</p>
                              </div>
                              <a href="{{ route('admin.sale.index') }}" 
                                 class="btn btn-primary" 
                                 >
                                 ⬅ Back
                              </a>
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
