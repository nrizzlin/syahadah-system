<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

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
        $attendances = $user->attendances()->paginate(5); // Use paginate here
        return view('Attendances.list-user', compact('attendances'));
    }

    public function ReportAttendance()
    {
        // Retrieve all users
        $totalUsers = User::count();

        // Retrieve all attendance records
        $attendancesD = Attendance::paginate(5);

        // Count the number of users with attendance
        $usersWithAttendanceCount = Attendance::distinct('user_id')->count();
        // Calculate the number of users without attendance
        $usersWithoutAttendanceCount = $totalUsers - $usersWithAttendanceCount;
        
        $clockInCount = Attendance::whereNotNull('clockIn')->count();
        $clockOutCount = Attendance::whereNotNull('clockOut')->count();;

        return view('Attendances.report', compact('attendancesD','clockInCount','clockOutCount','usersWithAttendanceCount','usersWithoutAttendanceCount'));
    }

    public function clockIn(Request $request)
    {
        // Check the last clock-out time
        $attendance = Attendance::where('user_id', Auth::user()->id)
            ->whereNotNull('clockOut')
            ->latest()
            ->first();

        // Create a new attendance record for clock in
        $attendance = Attendance::create([
            'user_id' => Auth::user()->id,
            'clockIn' => now(),
            'tasks' => $request->input('tasks') ?? [],
        ]);

        Alert::success('Congrats', 'You have Clock-in your attendances');
        return redirect()->back()->with('success', 'Clock in successfully');
    }
    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function clockOut(Request $request)
    {
        $attendance = Attendance::where('user_id', $request->user()->id)
            ->whereNull('clockOut')
            ->latest()
            ->first();

            if (!$attendance) {

                throw ValidationException::withMessages([
                    'clockOut' => trans('auth.clockOut'),
                ]);
            }
        // if (!$attendance) {
        //     return redirect()->back()->with('error', 'You need to clock in first');
        // }

        // Update the attendance record with the current time as clock out and the updated tasks
        $attendance->update([
            'clockOut' => now(),
        ]);


        Alert::success('Congrats', 'You have Clock-out your attendances');
        return redirect()->back()->with('success', 'Clock out successfully');
    }

    public function searchData(Request $request)
    {
        $search = $request->input('search');
    
        // Check if there is a search query
        if ($search) {
            // Use a join to search based on the 'name' column in the 'users' table
            $attendancesD = Attendance::join('users', 'users.id', '=', 'attendances.user_id')
            ->where('users.name', 'like', "%$search%")
            ->paginate(5);
        } else {
            // If there's no search query, retrieve all users with pagination
            $attendancesD = Attendance::paginate(5);
        }

        $clockInCount = Attendance::whereNotNull('clockIn')->count();
        $clockOutCount = Attendance::whereNotNull('clockOut')->count();
        $totalUsers = User::count();
        // Count the number of users with attendance
        $usersWithAttendanceCount = Attendance::distinct('user_id')->count();

        // Calculate the number of users without attendance
        $usersWithoutAttendanceCount = $totalUsers - $usersWithAttendanceCount;

       return view('Attendances.report', compact('attendancesD', 'clockInCount', 'clockOutCount', 'usersWithAttendanceCount', 'usersWithoutAttendanceCount'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Get the ID of the logged-in user
        $userId = Auth::id();

        // Check if there is a search query
        if ($search) {
            // Use whereHas to search based on the 'tasks' column for the specific user
            $attendances = Attendance::where('user_id', $userId)
                ->where(function ($query) use ($search) {
                    $query->where('tasks', 'like', "%$search%");
                })
                ->paginate(5);
        } else {
            // If there's no search query, retrieve all attendance records for the specific user with pagination
            $attendances = Attendance::where('user_id', $userId)->paginate(5);
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

