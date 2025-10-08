@extends('admin.layouts.app')
@section('content')
<style>
    /* Font color only - NO background */
    .shift-color.present {
        color: green;
    }
    .shift-color.half_day {
        color: blue;
    }
    .shift-color.absent {
        color: red;
    }
    .date-filter-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }
    .date-filter-container label {
        margin: 0;
        font-weight: 500;
    }
    .date-filter-container input[type="date"] {
        max-width: 200px;
    }
</style>

<div class="page-content">
<div class="container-fluid">
   <div class="row listing-form">
      <div class="col-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="card-title mb-0">Attendances List</h4>
               <button type="submit" form="attendanceForm" class="btn btn-primary">Save Attendance</button>
            </div>
            <div class="card-body">

               <!-- Date Filter -->
               <div class="date-filter-container">
                   <label for="weekDatePicker">Select Date:</label>
                   <input type="date" id="weekDatePicker" class="form-control" value="{{ request('week_date', now()->format('Y-m-d')) }}">
                   <button type="button" id="loadWeek" class="btn btn-primary">Load Week</button>
                   <button type="button" id="currentWeek" class="btn btn-secondary">Current Week</button>
               </div>

               <!-- Search Box -->
               <div class="search-box mb-3">
                   <input type="text" id="searchLabour" class="form-control" placeholder="Search by labour name...">
               </div>

               <form id="attendanceForm" method="POST" action="{{ route('admin.attendances.store') }}">
                   @csrf
                   <div class="table-responsive" style="overflow-x:auto; max-height:600px;">
                       <table id="attendanceTable" class="table table-bordered attendance-table">
                           @php
                               use Carbon\Carbon;
                               
                               // Get selected date from request or use current date
                               $selectedDate = request('week_date') ? Carbon::parse(request('week_date')) : Carbon::now();
                               $startOfWeek = $selectedDate->copy()->startOfWeek(Carbon::MONDAY);
                               $today = Carbon::now()->format('Y-m-d');
                           @endphp
                           <thead class="table-light sticky-top">
                               <tr>
                                   <th>Sno</th>
                                   <th>Labour Name</th>
                                   <th>Rates</th>
                                   @for ($i = 0; $i < 7; $i++)
                                       @php 
                                           $day = $startOfWeek->copy()->addDays($i);
                                           $isFuture = $day->gt(Carbon::today());
                                       @endphp
                                       <th>
                                           {{ $day->format('d/m/Y') }}<br>
                                           <small>{{ $day->format('l') }}</small>
                                           @if ($isFuture)
                                               <span class="text-danger d-block small">(Future)</span>
                                           @endif
                                       </th>
                                   @endfor
                                   <th>Total Amount</th>
                                  
                               </tr>
                           </thead>
                           
                           <tbody id="attendanceTableBody">
                                @foreach ($labours as $labour)
                                    @php
                                        $labourAttendance = $attendance->where('labour_id', $labour->id);
                                    @endphp
                                    <tr data-labour-id="{{ $labour->id }}" data-labour-name="{{ strtolower($labour->name) }}">
                                         <td>
                                           {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.attendances.view', $labour->id) }}" 
                                            style="text-decoration: none; color: inherit;" 
                                            data-bs-toggle="tooltip" 
                                            title="Attendance Sheet">
                                                {{ $labour->name }}
                                            </a>
                                        </td>
                                        <td class="rate-info">
                                            Day: ₹{{ number_format($labour->day_shift, 2) }}<br>
                                            Night: ₹{{ number_format($labour->night_shift, 2) }}
                                        </td>

                                        @for ($i = 0; $i < 7; $i++)
                                            @php
                                                $date = $startOfWeek->copy()->addDays($i)->format('Y-m-d');
                                                $isFuture = $date > $today;

                                                $att = null;
                                                foreach($labourAttendance as $record){
                                                    if(\Carbon\Carbon::parse($record->attendance_date)->format('Y-m-d') == $date){
                                                        $att = $record;
                                                        break;
                                                    }
                                                }

                                                $dayValue = $att->day_shift_status ?? '';
                                                $nightValue = $att->night_shift_status ?? '';
                                            @endphp

                                            <td>
                                                @if($isFuture)
                                                    <div class="text-muted text-center" style="font-size:13px;">N/A</div>
                                                @else
                                                  
                                                    <input type="hidden" name="attendance[{{ $labour->id }}][{{ $i }}][day_checkbox]" value="1">
                                                   
                                                   

                                            <div class="d-flex align-items-center gap-1">
                                                <!-- ✅ Day Dropdown -->
                                                 <label style="height:10px;">Day</label>
                                                <select class="form-select form-select-sm shift-select shift-color day-status" 
                                                    name="attendance[{{ $labour->id }}][{{ $i }}][day]"
                                                    style="width: 50px; padding: 2px 4px;">
                                                    <option value="present" {{ $dayValue=='present'?'selected':'' }}>P</option>
                                                    <option value="half_day" {{ $dayValue=='half_day'?'selected':'' }}>H</option>
                                                    <option value="absent" {{ $dayValue=='absent' || !$dayValue?'selected':'' }}>A</option>
                                                </select>

                                                <input type="hidden" name="attendance[{{ $labour->id }}][{{ $i }}][day_rate]" value="{{ $labour->day_shift }}">
                                                <input type="hidden" name="attendance[{{ $labour->id }}][{{ $i }}][date]" value="{{ $date }}">
                                                <input type="hidden" name="attendance[{{ $labour->id }}][{{ $i }}][night_checkbox]" value="1">

                                                <!-- 🌙 Night Dropdown -->
                                                <label style="height:10px;">Night</label>
                                                <select class="form-select form-select-sm shift-select shift-color night-status" 
                                                    name="attendance[{{ $labour->id }}][{{ $i }}][night]"
                                                    style="width: 50px; padding: 2px 4px;">
                                                    <option value="present" {{ $nightValue=='present'?'selected':'' }}>P</option>
                                                    <option value="half_day" {{ $nightValue=='half_day'?'selected':'' }}>H</option>
                                                    <option value="absent" {{ $nightValue=='absent' || !$nightValue?'selected':'' }}>A</option>
                                                </select>
                                            </div>



                                                    <input type="hidden" name="attendance[{{ $labour->id }}][{{ $i }}][night_rate]" value="{{ $labour->night_shift }}">
                                                @endif
                                            </td>
                                        @endfor

                                        <td>
                                            <input type="text" class="form-control total-amount" readonly value="₹ 0.00">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                           <tfoot>
                               <tr>
                                   <th colspan="9" class="text-end">Grand Total</th>
                                   <th id="grandTotal"><strong>₹ 0.00</strong></th>
                               </tr>
                           </tfoot>
                       </table>
                   </div>
               </form>

               <div id="noResults" style="display:none; text-align:center; padding:20px;">
                  <p class="text-muted">No labours found matching your search.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];

    // 📅 Date Filter Logic
    const weekDatePicker = document.getElementById('weekDatePicker');
    const loadWeekBtn = document.getElementById('loadWeek');
    const currentWeekBtn = document.getElementById('currentWeek');

    loadWeekBtn.addEventListener('click', function() {
        const selectedDate = weekDatePicker.value;
        if (selectedDate) {
            window.location.href = `{{ route('admin.attendances.index') }}?week_date=${selectedDate}`;
        } else {
            alert('Please select a date');
        }
    });

    currentWeekBtn.addEventListener('click', function() {
        window.location.href = `{{ route('admin.attendances.index') }}`;
    });

    // Enter key support for date input
    weekDatePicker.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            loadWeekBtn.click();
        }
    });

    // 🟡 Search Filter
    const searchInput = document.getElementById('searchLabour');
    const tableBody = document.getElementById('attendanceTableBody');
    const noResults = document.getElementById('noResults');

    searchInput.addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        let visibleCount = 0;
        tableBody.querySelectorAll('tr').forEach(row => {
            const name = row.dataset.labourName;
            if (name.includes(term)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        noResults.style.display = visibleCount === 0 && term !== '' ? 'block' : 'none';
        calculateGrandTotal();
    });

    // 🧮 Calculate row total
    function calculateTotal(row) {
        let total = 0;
        row.querySelectorAll('.shift-select').forEach(sel => {
            const rate = sel.name.includes('[day]')
                ? parseFloat(row.querySelector('input[name$="[day_rate]"]').value)
                : parseFloat(row.querySelector('input[name$="[night_rate]"]').value);

            total += sel.value === 'present' ? rate :
                     sel.value === 'half_day' ? rate * 0.5 : 0;
        });
        row.querySelector('.total-amount').value = '₹ ' + total.toFixed(2);
        calculateGrandTotal();
    }

    // 🧮 Grand total calculation
    function calculateGrandTotal() {
        let grand = 0;
        tableBody.querySelectorAll('tr').forEach(row => {
            if (row.style.display !== 'none') {
                const val = parseFloat(row.querySelector('.total-amount').value.replace('₹', '').trim()) || 0;
                grand += val;
            }
        });
        document.getElementById('grandTotal').innerHTML = '<strong>₹ ' + grand.toFixed(2) + '</strong>';
    }

    // 🎨 Color set logic
    document.querySelectorAll('.shift-color').forEach(function (select) {
        function setColor(sel) {
            sel.classList.remove('present', 'half_day', 'absent');
            if (sel.value === 'present') sel.classList.add('present');
            else if (sel.value === 'half_day') sel.classList.add('half_day');
            else sel.classList.add('absent');
        }

        setColor(select);
        select.addEventListener('change', function () {
            setColor(select);
            calculateTotal(this.closest('tr'));
        });
    });

    // Initial calculation
    tableBody.querySelectorAll('tr').forEach(row => calculateTotal(row));
});
</script>
@endsection