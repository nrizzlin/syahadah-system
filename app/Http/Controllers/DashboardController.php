<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Resources;


class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $users = User::count();
        $event = Event::count();
        $resources = Resources::count();

        $mentorCount = User::where('usertype','mentor')->count();
        $daieCount = User::where('usertype','daie')->count();
        $mualafCount = User::where('usertype','mentor')->count();

        $events = Event::all();
        //User data for the chart 

        $userChartData = [
            'labels' => ['Mentor', 'Daie', 'Mualaf'],
            'data' => [$mentorCount, $daieCount, $mualafCount],
        ]; 

        return view('dashboard.admin', compact('users','event','resources','mentorCount','daieCount','mualafCount','userChartData','events'));
    }

}
