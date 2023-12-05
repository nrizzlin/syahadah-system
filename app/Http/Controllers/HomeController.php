<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
    
            if ($usertype == 'admin') {
                return redirect()->route('dashboard.admin');
            } else if ($usertype == 'daie') {
                return view('dashboard.daie');
            } else if ($usertype == 'mentor') {
                return redirect()->route('dashboard.mentor');
            } else if ($usertype == 'mualaf') {
                return view('dashboard.mualaf');
            }
        }
    }

    public function admin()
    {
        return view('admin.adminhome');
    }
}
