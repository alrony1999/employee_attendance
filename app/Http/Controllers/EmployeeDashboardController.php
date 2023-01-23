<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    public function dashboard()
    {

        return view('employee.employeeDashboard');
    }
    public function checkAttendance()
    {
        $attr = $this->check(auth()->id());

        if ($attr) {
            return response()->json([
                'message' => ucwords($attr->status),
                'status' => 200
            ]);
        } else {
            return response('', 201);
        }
    }
    public function dailyAttendance()
    {
        $id = auth()->id();

        if (!$this->check($id)) {
            $attendance = $this->attendance($id);
            if ($attendance) {
                return response()->json([
                    'message' => 'Done'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Absent',
                    'status' => 400
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Already Clicked',
                'status' => 400
            ]);
        }
    }
    protected function attendance($id)
    {
        $time = Carbon::now();
        $day = Carbon::tomorrow()->format('l');

        $start = Carbon::create($time->year, $time->month, $time->day, 10, 0, 0);
        $end1 = Carbon::create($time->year, $time->month, $time->day, 11, 0, 0);
        $end2 = Carbon::create($time->year, $time->month, $time->day, 12, 0, 0);
        $status = "";

        if ($time->between($start, $end1, true) && $day != 'Friday' && $day != 'Saturday') {
            $status = 'intime';
        } else if ($time->between($end1, $end2, true) && $day != 'Friday' && $day != 'Saturday') {
            $status = 'late';
        } else {
            $status = 'absent';
        }
        $attendance = new Attendance();
        $attendance->user_id = $id;
        $attendance->status = $status;
        $attendance->save();
        return true;
    }
    protected function check($id)
    {
        $at = Attendance::where('user_id', $id)->whereDate('created_at', Carbon::today())->first();
        return $at;
    }
}
