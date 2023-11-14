<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function indexDaie()
    {
        // Retrieve journals for the logged-in Daie
        // $attendances = Attendance::all();
        return view('Attendances.index-daie');
    }

    public function indexMentor()
    {
        // Retrieve journals for the logged-in Daie
        $attendances = Attendance::all();
        return view('Attendances.index-mentor', compact('attendances'));
    }

    public function indexMualaf()
    {
        // Retrieve journals for the logged-in Daie
        $attendances = Attendance::all();
        return view('Attendances.index-mualaf', compact('attendances'));
    }

    public function listAttendanceUser()
    {
        // Retrieve journals for the logged-in Daie
        $user = Auth::user();
        $attendances = $user->attendances;
        return view('Attendances.list-user', compact('attendances'));
    }

    public function ReportAttendance()
    {
        // Retrieve journals for the logged-in Daie
        $attendances = Attendance::all();
        return view('Attendances.list-user', compact('attendances'));
    }

    

    public function clockIn(Request $request)
{
    $attendance = Attendance::create([
        'user_id' => Auth::user()->id,
        'clockIn' => now(),
        'tasks' => $request->input('tasks') ?? [],
    ]);

    return redirect()->back()->with('success', 'Clock in successfully');
}

public function clockOut(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->whereNull('clockOut')
            ->latest()
            ->first();

        if (!$attendance) {
            // Update the attendance record with the current time as clock out
            return redirect()->back()->with('error', 'You need to clock in first');
        }

        $attendance->update([
            'clockOut' => now(),
        ]);

        return redirect()->back()->with('success', 'Clock out successfully');
    }
}
