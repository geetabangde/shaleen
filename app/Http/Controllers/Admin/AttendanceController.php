<?php

namespace App\Http\Controllers\Admin;
use App\Models\Attendance;  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AttendanceController extends Controller
{
 

public function index()
{
    $labours = DB::table('labour_managements')->get();

    $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
    $weekDates = collect();
    for ($i = 0; $i < 7; $i++) {
        $weekDates->push($startOfWeek->copy()->addDays($i));
    }

    // Existing attendance fetch and key by labour_id + date
    $attendance = Attendance::whereIn('labour_id', $labours->pluck('id'))
        ->whereBetween('attendance_date', [$startOfWeek, $startOfWeek->copy()->addDays(6)])
        ->get()
        ->keyBy(function($item){
            return $item->labour_id.'_'.$item->attendance_date;
        });

    return view('admin.attendances.index', compact('labours','weekDates','attendance'));
}

// public function index()
// {
//     $labours = DB::table('labour_managements')->get();
//     $attendance= Attendance::all();
//      $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
//     return view('admin.attendances.index', compact('labours', 'startOfWeek','attendance'));
// }




   




public function store(Request $request)
{
    $data = $request->all();

    if (empty($data['attendance']) || !is_array($data['attendance'])) {
        return back()->with('error', 'No attendance data provided.');
    }

    foreach ($data['attendance'] as $labourId => $days) {
        foreach ($days as $dayIndex => $shifts) {

           
            $attendanceDate = $shifts['date'] ?? null;
            if (!$attendanceDate) continue;

          
            $dayStatus = $shifts['day'] ?? 'absent';
            $nightStatus = $shifts['night'] ?? 'absent';

         
            $dayRate = isset($shifts['day_rate']) ? floatval($shifts['day_rate']) : 0.00;
            $nightRate = isset($shifts['night_rate']) ? floatval($shifts['night_rate']) : 0.00;

          
            $dayAmount = match($dayStatus) {
                'present' => $dayRate,
                'half_day' => $dayRate / 2,
                default => 0
            };

            $nightAmount = match($nightStatus) {
                'present' => $nightRate,
                'half_day' => $nightRate / 2,
                default => 0
            };

            $totalAmount = $dayAmount + $nightAmount;

          
            Attendance::updateOrCreate(
                [
                    'labour_id' => $labourId,
                    'attendance_date' => $attendanceDate,
                ],
                [
                    'day_shift_status' => $dayStatus,
                    'night_shift_status' => $nightStatus,
                    'day_rate' => $dayRate,
                    'night_rate' => $nightRate,
                    'day_shift_worked' => in_array($dayStatus, ['present', 'half_day']) ? 1 : 0,
                    'night_shift_worked' => in_array($nightStatus, ['present', 'half_day']) ? 1 : 0,
                    'total_amount' => $totalAmount,
                ]
            );
        }
    }

    return redirect()->back()->with('success', 'Attendance saved successfully.');
}
// Controller: AttendanceController.php


public function show($employeeId)
{
    $employee = DB::table('labour_managements')->where('id', $employeeId)->first();

    $month = request('month') ?? now()->format('m');
    $year = request('year') ?? now()->format('Y');

    $startOfMonth = Carbon::createFromDate($year, $month, 1);
    $endOfMonth = $startOfMonth->copy()->endOfMonth();
    $totalDaysInMonth = $startOfMonth->daysInMonth;

    $attendanceRecords = Attendance::where('labour_id', $employeeId)
        ->whereBetween('attendance_date', [$startOfMonth->startOfDay(), $endOfMonth->endOfDay()])
        ->get()
        ->keyBy(function($item){
            return Carbon::parse($item->attendance_date)->format('Y-m-d');
        });

    $days = [];
    $totals = [
        'day_shift_count' => 0,
        'night_shift_count' => 0,
        'day_earning' => 0,
        'night_earning' => 0,
        'half_days' => 0,
        'absent_days' => 0,
    ];

    for ($i = 0; $i < $totalDaysInMonth; $i++) {
        $date = $startOfMonth->copy()->addDays($i);
        $isFuture = $date->gt(Carbon::today());
        $dayName = $date->format('l');

        $record = $attendanceRecords->get($date->format('Y-m-d'));

        $dayStatus = '';
        $nightStatus = '';
        $dayRate = 0;
        $nightRate = 0;
        $salary = 0;

        if($record && !$isFuture){
            $dayStatus = $record->day_shift_status;
            $nightStatus = $record->night_shift_status;

            $dayRate = $record->day_rate ?? 0;
            $nightRate = $record->night_rate ?? 0;

            $salary += ($dayStatus=='present' ? $dayRate : ($dayStatus=='half_day' ? $dayRate*0.5 : 0));
            $salary += ($nightStatus=='present' ? $nightRate : ($nightStatus=='half_day' ? $nightRate*0.5 : 0));

            // Totals
            if($dayStatus=='present') { $totals['day_shift_count']++; $totals['day_earning'] += $dayRate; }
            if($dayStatus=='half_day') { $totals['day_shift_count']++; $totals['day_earning'] += $dayRate*0.5; $totals['half_days']++; }
            if($dayStatus=='absent') $totals['absent_days']++;

            if($nightStatus=='present') { $totals['night_shift_count']++; $totals['night_earning'] += $nightRate; }
            if($nightStatus=='half_day') { $totals['night_shift_count']++; $totals['night_earning'] += $nightRate*0.5; $totals['half_days']++; }
            if($nightStatus=='absent') $totals['absent_days']++;
        }

        $days[] = [
            'date' => $date->format('d/m/Y'),
            'day' => $dayName,
            'day_status' => $dayStatus ?: 'absent',
            'night_status' => $nightStatus ?: 'absent',
            'status' => $isFuture ? 'future' : ($dayStatus=='present' || $nightStatus=='present' ? 'present' : ($dayStatus=='half_day' || $nightStatus=='half_day' ? 'halfday' : 'absent')),
            'salary' => $salary,
            'is_future' => $isFuture,
        ];
    }

    $monthYear = $startOfMonth->format('F Y');
    $totalPayable = collect($days)->sum('salary');

    return view('admin.attendances.view', compact(
        'employee','days','monthYear','totalDaysInMonth','totals','totalPayable','month','year'
    ));
}




}

