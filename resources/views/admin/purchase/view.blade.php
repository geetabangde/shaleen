<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Purchase Order</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0 auto;
      width: 850px;
      font-size: 13px;
      color: #000;
      background: #f4f4f4;
    }

    .invoice-container {
      background-color: #fff;
      padding: 20px 30px;
      margin: 20px auto;
      border: 2px solid #1a468d;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #1a468d;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .header img { height: 80px; }
    .company-details { text-align: right; }
    .company-details h1 {
      color: #e3a21a;
      font-size: 28px;
      margin: 0;
    }
    .company-details h2 {
      font-size: 14px;
      margin: 2px 0;
    }
    .company-details small {
      display: block;
      font-size: 11px;
      color: #555;
    }

    .title {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin: 15px 0;
      color: #1a468d;
      text-decoration: underline;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
    }
    th, td {
      border: 1px solid #1a468d;
      padding: 6px;
      text-align: left;
    }
    th {
      background-color: #d9e6f7;
      color: #000;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 12px;
    }
    .totals td {
      font-weight: bold;
      text-align: right;
    }
    .totals td:last-child { width: 120px; }

    .footer {
      margin-top: 20px;
      font-size: 11px;
      text-align: center;
      color: #555;
    }
    .print-btn { text-align: center; margin-top: 20px; }
    .print-btn button {
      padding: 10px 20px;
      background: #1a468d;
      color: #fff;
      border: none;
      cursor: pointer;
      font-size: 14px;
    }
    .print-btn button:hover { background: #16386d; }
  </style>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0 auto;
    width: 850px;
    font-size: 13px;
    color: #000;
    background: #f4f4f4;
    min-height: 2000px; /* Page height badhaya */
  }

  .invoice-container {
    background-color: #fff;
    padding: 30px 40px; /* Print aur view dono me height badhegi */
    margin: 20px auto;
    border: 2px solid #1a468d;
    min-height: 1400px; /* container height increase */
  }

  /* Print ke liye special styles */
  @media print {
    body, .invoice-container {
      min-height: 500px; /* print me aur bada */
      width: 100%;
      margin: 0;
      padding: 0;
      border: none;
      background: #fff;
    }

    .print-btn {
      display: none; 
    }
  }
</style>

</head>
<body>
  <div class="invoice-container">
    <!-- Header -->
    <div class="header">
      <img src="{{ asset('backend/images/logo/logoshaleen.png') }}" style="width:auto; height:100px;" alt="Logo">
      <div class="company-details">
        <h1>SHALEEN OVERSEAS</h1>
        <h2>Private Limited</h2>
        <small>A Star Export House | ISO 9001:2008 Certified | Premium Quality Pulses, Rice</small>
      </div>
    </div>

    <!-- Title -->
    <div class="title">PURCHASE ORDER</div>

    <!-- Vendor / Shipped To -->
    <table>
      <tr>
        <th>Vendor</th>
        <th>Shipped To</th>
      </tr>
      <tr>
       <td>
            {{ $purchase->seller->name ?? '-' }} <br>
            Contact: {{ $purchase->seller->contact_number ?? '-' }} <br>

            @php
                $sellerAddress = is_string($purchase->seller->address) 
                                    ? json_decode($purchase->seller->address, true) 
                                    : $purchase->seller->address;
            @endphp

            @if(!empty($sellerAddress) && isset($sellerAddress[0]))
                {{ $sellerAddress[0]['consignment_address'] ?? '' }} <br>
                Pincode: {{ $sellerAddress[0]['pincode'] ?? '' }} <br>
                {{ $sellerAddress[0]['state'] ?? '' }}, {{ $sellerAddress[0]['country'] ?? '' }}
            @else
                Address not available
            @endif
            </td>

       <td>
            {{ $purchase->buyer->name ?? '-' }} <br>
            Contact: {{ $purchase->buyer->contact_number ?? '-' }}<br>

            @php
                $buyerAddress = is_string($purchase->buyer->address) 
                                    ? json_decode($purchase->buyer->address, true) 
                                    : $purchase->buyer->address;
            @endphp

            @if(!empty($buyerAddress) && isset($buyerAddress[0]))
                {{ $buyerAddress[0]['consignment_address'] ?? '' }} <br>
                Pincode: {{ $buyerAddress[0]['pincode'] ?? '' }} <br>
                {{ $buyerAddress[0]['state'] ?? '' }}, {{ $buyerAddress[0]['country'] ?? '' }}
            @else
                Address not available
            @endif
            </td>

      </tr>
    </table>

    <!-- Shipping Details -->
    <table>
      <tr>
        <th>Contract No</th>
        <th>Date</th>
        <th>Delivery</th>
      </tr>
      <tr>
        <td>{{ $purchase->raw_contract_no }}</td>
        <td>{{ $purchase->raw_date }}</td>
        <td>{{ $purchase->raw_delivery }}</td>
      </tr>
    </table>

    <!-- Items -->
    <table>
      <tr>
        <th>Commodity</th>
        <th>Specification</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>{{ $purchase->raw_commodity }}</td>
        <td>{{ $purchase->raw_specification }}</td>
        <td>{{ $purchase->raw_quantity }}</td>
        <td>{{ number_format($purchase->raw_price, 2) }}</td>
        <td>{{ number_format($purchase->raw_price * $purchase->raw_quantity, 2) }}</td>
      </tr>
    </table>

    <!-- Totals -->
    <table class="totals">
      <tr>
        <td colspan="4">Subtotal</td>
        <td>{{ number_format($purchase->raw_price * $purchase->raw_quantity, 2) }}</td>
      </tr>
      {{-- <tr>
        <td colspan="4">Payment Terms</td>
        <td>{{ $purchase->raw_payment_terms }}</td>
      </tr> --}}
      <tr>
        <td colspan="4">Other</td>
        <td>-</td>
      </tr>
      
      <tr>
        <td colspan="4">Grand Total</td>
        <td>{{ number_format($purchase->raw_price * $purchase->raw_quantity, 2) }}</td>
        <tr>
        <td colspan="4">Payment Terms</td>
        <td>{{ $purchase->raw_payment_terms }}</td>
      </tr>
      </tr>
    </table>

    <!-- Footer -->
    <div class="footer">
      {!! nl2br(e($purchase->raw_terms_conditions)) !!}
    </div>

    <div class="print-btn">
      <button onclick="window.print()">Print Purchase Order</button>
    </div>
  </div>
</body>
</html>