<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bags Purchase Order</title>
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
    min-height: 1500px; /* Page height badhaya */
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
      display: none; /* Print button print me show nahi hoga */
    }
  }
</style>

  
</head>
<body>
  <div class="invoice-container">
    <!-- Header -->
    <div class="header">
      <img src="{{ asset('backend/images/logo/logoshaleen.png') }}" style="auto; height:100px;" alt="Logo">
      <div class="company-details">
        <h1>SHALEEN OVERSEAS</h1>
        <h2>Private Limited</h2>
        <small>A Star Export House | ISO 9001:2008 Certified | Premium Quality Pulses, Rice</small>
      </div>
    </div>

    <!-- Title -->
    <div class="title">BAGS PURCHASE ORDER</div>

    <!-- Buyer / Seller -->
    <table>
      <tr>
        <th>Buyer</th>
        <th>Seller</th>
      </tr>
      <tr>
        <td>
          {{ $bag->buyer->name ?? '-' }} <br>
          Packing: {{ $bag->packing ?? '-' }} <br>
          Containers: {{ $bag->number_of_container ?? '-' }}
        </td>
        <td>
        {{ $bag->seller->name ?? '-' }}<br>
        
          Broker: {{ $bag->broker ?? '-' }} <br>
          Delivery At: {{ $bag->delivery_at ?? '-' }}
        </td>
      </tr>
    </table>

    <!-- Shipping Details -->
    <table>
      <tr>
        <th>Contract No</th>
        <th>Date</th>
        <th>Marking</th>
      </tr>
      <tr>
        <td>{{ $bag->contract_no }}</td>
        <td>{{ $bag->date }}</td>
        <td>{{ $bag->marking }}</td>
      </tr>
    </table>

    <!-- Items -->
    <table>
      <tr>
        <th>Packing</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      <tr>
        <td>{{ $bag->packing }}</td>
        <td>{{ $bag->quantity }}</td>
        <td>{{ number_format($bag->price, 2) }}</td>
        <td>{{ number_format($bag->price * $bag->quantity, 2) }}</td>
      </tr>
    </table>

    <!-- Totals -->
    <table class="totals">
      <tr>
        <td colspan="3">Subtotal</td>
        <td>{{ number_format($bag->price * $bag->quantity, 2) }}</td>
      </tr>
      <tr>
        <td colspan="3">Other</td>
        <td>-</td>
      </tr>
      <tr>
        <td colspan="3">Grand Total</td>
        <td>{{ number_format($bag->price * $bag->quantity, 2) }}</td>
      </tr>
    </table>

    <!-- Footer -->
    <div class="footer">
      Remark: {{ $bag->remark ?? 'N/A' }} <br>
      {{-- Subject to Mumbai Jurisdiction. --}}
    </div>

    <div class="print-btn">
      <button onclick="window.print()">Print Purchase Order</button>
    </div>
  </div>
</body>
</html>