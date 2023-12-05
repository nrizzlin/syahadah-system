<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Resources;
use App\Models\Attendance;
use App\Models\Journal;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $users = User::count();
        $event = Event::count();
        $resources = Resources::count();

        $mentorCount = User::where('usertype','mentor')->count();
        $daieCount = User::where('usertype','daie')->count();
        $mualafCount = User::where('usertype','mualaf')->count();

        $events = Event::all();
        //User data for the chart 

        $userChartData = [
            'labels' => ['Mentor', 'Daie', 'Mualaf'],
            'data' => [$mentorCount, $daieCount, $mualafCount],
        ]; 

        return view('dashboard.admin', compact('users', 'event', 'resources', 'mentorCount', 'daieCount', 'mualafCount', 'userChartData', 'events'));
    }
    public function indexMentor()
    {
        $user = Auth::user();
        $userId = $user->id;
    
        $mualafCount = User::where('usertype', 'mualaf')->count(); 
        $attendanceCount = Attendance::where('user_id', $userId)->count();
        $JournalCount = Journal::where('user_id', $userId)->count();
        $clockInCount = Attendance::where('user_id', $userId)->whereNotNull('clockIn')->count();
        $clockOutCount = Attendance::where('user_id', $userId)->whereNotNull('clockOut')->count();
        $notClockInCount = Attendance::where('user_id', $userId)->whereNull('clockIn')->count();
        $notClockOutCount = Attendance::where('user_id', $userId)->whereNull('clockOut')->count();
    
        $attendanceChartData = [
            'labels' => ['Clock-in', 'Clock-out', 'Not Clock-in', 'Not Clock-out'],
            'data' => [$clockInCount, $clockOutCount, $notClockInCount, $notClockOutCount],
        ];
    
        // Pass the variables to the view
        return view('dashboard.mentor', compact('mualafCount','JournalCount', 'clockInCount','notClockInCount', 'notClockOutCount' ,'clockOutCount', 'attendanceChartData','attendanceCount'));
    }

}
