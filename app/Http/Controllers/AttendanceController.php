<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\User;
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
        // Retrieve all users
        $totalUsers = User::count();

        // Retrieve all attendance records
        $attendances = Attendance::paginate(5);

        // Count the number of users with attendance
        $usersWithAttendanceCount = Attendance::distinct('user_id')->count();

        // Calculate the number of users without attendance
        $usersWithoutAttendanceCount = $totalUsers - $usersWithAttendanceCount;
        
        $clockInCount = Attendance::whereNotNull('clockIn')->count();
        $clockOutCount = Attendance::whereNotNull('clockOut')->count();;

        return view('Attendances.list-user', compact('attendances','clockInCount','clockOutCount','usersWithAttendanceCount','usersWithoutAttendanceCount'));
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

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Check if there is a search query
        if ($search) {
            // Use a join to search based on the 'name' column in the 'users' table
            $attendances = Attendance::join('users', 'users.id', '=', 'attendances.user_id')
            ->where('users.name', 'like', "%$search%")
            ->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $attendances = Attendance::paginate(5);
        }

        $clockInCount = Attendance::whereNotNull('clockIn')->count();
        $clockOutCount = Attendance::whereNotNull('clockOut')->count();
        $totalUsers = User::count();
        // Count the number of users with attendance
        $usersWithAttendanceCount = Attendance::distinct('user_id')->count();

        // Calculate the number of users without attendance
        $usersWithoutAttendanceCount = $totalUsers - $usersWithAttendanceCount;

       return view('Attendances.list-user', compact('attendances', 'clockInCount', 'clockOutCount', 'usersWithAttendanceCount', 'usersWithoutAttendanceCount'));
    }
}

