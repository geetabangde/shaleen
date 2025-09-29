@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="row view-form">
                     <div class="col-12">
                        <div class="card-header"><a href="{{ route('admin.sale.index') }}" class="btn btn-primary">Back</a></div>
                    </div>
                    <form action="{{ route('admin.sale.subSale.store', $sale->id) }}" method="post">
                        @csrf
                        <div class="card-header">
                            <div class="row g-3">
                                 <!-- Quantity -->
                                <div class="col-md-6">
                                     <label>Quantity (Available: {{ $sale->quantity }})</label>
                                    <input type="number" step="0.01" name="quantity" id="quantity"
                                            class="form-control @error('quantity') is-invalid @enderror"
                                            value="{{ old('quantity') }}">
                                            
                                    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <!-- Price -->
                                <div class="col-md-6">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="number" step="0.01" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price') }}">
                                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 text-end">
                                       <button type="submit" class="btn btn-primary">Save Sale</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="mb-0">Sub Sales List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quantity</th>
                                        <th>Sale Price</th>
                                        <!-- <th>Total Amount</th> -->
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sale->subSales as $sub)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sub->quantity }}</td>
                                            <td>{{ number_format($sub->sale_price, 2) }}</td>
                                            <!-- <td>{{ number_format($sub->quantity * $sub->sale_price, 2) }}</td> -->
                                            <td>{{ $sub->created_at->format('d-m-Y h:i A') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No sub-sales available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Remaining Quantity -->
                            <div class="mt-3">
                                <strong>Remaining Quantity: </strong> {{ $sale->quantity }}
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
