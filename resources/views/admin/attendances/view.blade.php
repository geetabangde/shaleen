@extends('admin.layouts.app')
@section('title', 'Attendance | KRL')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-md-6">
                <h4>{{ $employee->name }} - Attendance for {{ $monthYear }}</h4>
            </div>
           <div class="col-md-6 text-end">
                <a href="{{ url()->previous() }}" class="btn btn-primary">⬅ Back</a>
            </div>
        </div>

        {{-- Month/Year Filter --}}
        <form method="GET" class="row mb-4">
            <div class="col-md-3">
                <label>Month</label>
                <select name="month" class="form-select">
                    @for($m=1;$m<=12;$m++)
                        <option value="{{ sprintf('%02d',$m) }}" {{ $month==sprintf('%02d',$m)?'selected':'' }}>
                            {{ \Carbon\Carbon::createFromDate(null,$m,1)->format('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label>Year</label>
                <select name="year" class="form-select">
                    @for($y=now()->year; $y>=now()->year-5;$y--)
                        <option value="{{ $y }}" {{ $year==$y?'selected':'' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-success">Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Day Shift</th>
                        <th>Night Shift</th>
                        <th>Daily Salary</th>
                        <th>Running Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $runningTotal=0; @endphp
                    @foreach($days as $day)
                        @php $runningTotal += $day['salary']; @endphp
                        <tr @if($day['is_future']) style="background-color:#f8f9fa;" @endif>
                            <td>{{ $day['date'] }}</td>
                            <td>{{ $day['day'] }}</td>
                           
                             <td class="@if($day['status']=='present') text-success @elseif($day['status']=='halfday') text-primary @else text-danger @endif">
                              {{ $day['is_future'] ? '-' : ucfirst($day['day_status']) }}
                            </td>
                            <td class="@if($day['status']=='present') text-success @elseif($day['status']=='halfday') text-primary @else text-danger @endif">
                               {{ $day['is_future'] ? '-' : ucfirst($day['night_status']) }}
                            </td>

                            <td>₹{{ number_format($day['salary'],2) }}</td>
                            <td>₹{{ number_format($runningTotal,2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-end">Totals</th>
                        <th>Day Shifts: {{ $totals['day_shift_count'] }}</th>
                        <th>Night Shifts: {{ $totals['night_shift_count'] }}</th>
                        <th>Half Days: {{ $totals['half_days'] }}<br>Absent: {{ $totals['absent_days'] }}</th>
                        <th colspan="2">Total Payable: ₹{{ number_format($totalPayable,2) }}</th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-end">Earnings</th>
                        <th>Day: ₹{{ number_format($totals['day_earning'],2) }}</th>
                        <th>Night: ₹{{ number_format($totals['night_earning'],2) }}</th>
                        <th colspan="3"></th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection
