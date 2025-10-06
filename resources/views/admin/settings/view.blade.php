<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sale Contract - {{ $saleContract->raw_contract_no ?? 'No.' }}</title>
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
      padding: 30px 40px; /* Print aur view dono me height badhegi */
      margin: 20px auto;
      border: 2px solid #1a468d;
      min-height: 1400px; /* container height increase */
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #1a468d;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .header img { height: 100px; width: auto; } /* Logo size set to 100px height */
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
    .totals tr:nth-child(5) td:last-child { /* Payment Terms row */
        text-align: left; 
        font-weight: normal; 
    }


    .footer {
      margin-top: 20px;
      font-size: 11px;
      color: #555;
      padding: 10px 0;
      border-top: 1px solid #ccc;
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
  
    /* Print ke liye special styles */
    @media print {
      body, .invoice-container {
        min-height: 500px;
        width: 100%;
        margin: 0;
        padding: 0;
        border: none;
        background: #fff;
      }
      .print-btn {
        display: none; 
      }
      .footer {
          border-top: 1px solid #555; /* Print me dark border */
      }
    }
  </style>

</head>
<body>
  <div class="invoice-container">
    <div class="header">
      {{-- NOTE: 'asset()' function is used for public file paths in Laravel --}}
      <img src="{{ asset('backend/images/logo/logoshaleen.png') }}" alt="Shaleen Overseas Logo">
      <div class="company-details">
        <h1>SHALEEN OVERSEAS</h1>
        <h2>Private Limited</h2>
        <small>A Star Export House | ISO 9001:2008 Certified | Premium Quality Pulses, Rice</small>
      </div>
    </div>

    <div class="title">SALE CONTRACT</div>

    <table>
      <tr>
        <th>Seller's Name & Address</th>
        <th>Buyer's Name & Address</th>
      </tr>
      <tr>
       {{-- Seller Details --}}
       <td>
            {{ $saleContract->seller->name ?? '-' }} <br>
            Contact: {{ $saleContract->seller->contact_number ?? '-' }} <br>

            {{-- 💡 Address Handling: We try to decode the JSON address. 
                 It's highly recommended to use $casts = ['address' => 'array'] in your Seller/Buyer Model for cleaner code. --}}
            @php
                // Check if it's a string (JSON) and decode it, otherwise use it as is (if Eloquent Casts are used)
                $sellerAddress = is_string($saleContract->seller->address ?? '') 
                                    ? json_decode($saleContract->seller->address, true) 
                                    : ($saleContract->seller->address ?? []);
                
                // Assuming address is an array of objects, we use the first element [0]
                $firstSellerAddress = $sellerAddress[0] ?? null;
            @endphp

            @if($firstSellerAddress)
                {{ $firstSellerAddress['consignment_address'] ?? 'Address line N/A' }} <br>
                Pincode: {{ $firstSellerAddress['pincode'] ?? 'N/A' }} <br>
                {{ $firstSellerAddress['state'] ?? 'N/A' }}, {{ $firstSellerAddress['country'] ?? 'N/A' }}
            @else
                Address not available
            @endif
            </td>

       {{-- Buyer Details --}}
       <td>
            {{ $saleContract->buyer->name ?? '-' }} <br>
            Contact: {{ $saleContract->buyer->contact_number ?? '-' }}<br>

            @php
                $buyerAddress = is_string($saleContract->buyer->address ?? '') 
                                    ? json_decode($saleContract->buyer->address, true) 
                                    : ($saleContract->buyer->address ?? []);

                $firstBuyerAddress = $buyerAddress[0] ?? null;
            @endphp

            @if($firstBuyerAddress)
                {{ $firstBuyerAddress['consignment_address'] ?? 'Address line N/A' }} <br>
                Pincode: {{ $firstBuyerAddress['pincode'] ?? 'N/A' }} <br>
                {{ $firstBuyerAddress['state'] ?? 'N/A' }}, {{ $firstBuyerAddress['country'] ?? 'N/A' }}
            @else
                Address not available
            @endif
            </td>
      </tr>
    </table>

    <table>
      <tr>
        <th>Contract No</th>
        <th>Date</th>
        <th>Shipment</th>
      </tr>
      <tr>
        <td>{{ $saleContract->contract_no ?? '-' }}</td>
        <td>{{ $saleContract->contract_date ?? '-' }}</td>
        <td>{{ $saleContract->shipment_date ?? '-' }}</td>
      </tr>
    </table>
    @php
        $quantity = (float) $saleContract->quantity;
        $price = (float) $saleContract->price;
        $subtotal = $price * $quantity;
        $grandTotal = $subtotal;
    @endphp

    <table>
      <tr>
        <th>Commodity</th>
        <th>Packing</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>{{ $saleContract->commodity ?? '-' }}</td>
        <td>{{ $saleContract->packing	 ?? '-' }}</td>
        <td>{{ $saleContract->quantity }}</td>
        <td>{{ number_format($saleContract->price, 2) }}</td>
        <td>{{ number_format($saleContract->total_value, 2) }}</td>
      </tr>
      {{-- Add more rows for items here if applicable --}}
    </table>

    <table class="totals">
      <tr>
        <td colspan="4">Subtotal</td>
       <td>{{ number_format($saleContract->total_value, 2) }}</td>
      </tr>
      <tr>
        <td colspan="4">Other Charges</td>
        <td>-</td>
      </tr>
      <tr>
        <td colspan="4">Grand Total</td>
        <td>{{ number_format($saleContract->total_value, 2) }}</td>
      </tr>
      <tr>
        <td colspan="4">Payment Terms</td>
        <td>{{ $saleContract->payment_terms ?? 'N/A' }}</td>
      </tr>
    </table>
    @php
    $documents = is_string($saleContract->documents ?? '') 
                    ? json_decode($saleContract->documents, true) 
                    : ($saleContract->documents ?? []);
@endphp

@if(!empty($documents))
    <h3 style="margin-top:20px; color:#1a468d;">Documents</h3>
    <ul style="list-style: none; padding-left: 0;">
        @foreach($documents as $index => $doc)
            <li>{{ $index + 1 }}) {{ $doc['name'] ?? 'Document' }}</li>
        @endforeach
    </ul>
@endif



    <div class="footer">
        <strong>Terms and Conditions:</strong>
      <p>
    {!! $saleContract->terms_conditions ?? 'No terms and conditions provided.' !!}
</p>

    </div>
    
    <div style="clear:both; margin-top: 50px;">
        <div style="width: 45%; float: left; text-align: center; border-top: 1px solid #000; padding-top: 5px;">
            For **SHALEEN OVERSEAS** (Seller)
        </div>
        <div style="width: 45%; float: right; text-align: center; border-top: 1px solid #000; padding-top: 5px;">
            For **{{ $saleContract->buyer->name ?? 'Buyer' }}** (Buyer)
        </div>
    </div>


    <div class="print-btn">
      <button onclick="window.print()">Print Sale Contract</button>
    </div>
  </div>
</body>
</html>