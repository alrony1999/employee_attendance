<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.adminDashboard', ['users' => $users]);
    }
    public function attendance($id)
    {
        $attendance = Attendance::latest()->where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->get();
        $intime = $attendance->where('status', 'intime')->count();
        $late = $attendance->where('status', 'late')->count();
        $absent = $attendance->where('status', 'absent')->count();
        return view('attendance-list', ['attendanceList' => $attendance, 'intime' => $intime, 'late' => $late, 'absent' => $absent]);
    }
    public function addEmployee(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email'
        ]);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = '12345678';
        $user->save();
        return back()->with('msg', 'Added Successfully');
    }
}
