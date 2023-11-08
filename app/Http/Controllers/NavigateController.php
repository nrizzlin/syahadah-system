<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigateController extends Controller
{
    public function User()
    {
        return view('admin.user_management');
    }


    public function journallist()
    {
        
        return view('addUser');
    }

    public function event()
    {
        
        return view('daie.ManageEvents.index');
    }
}
