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

            $selectedUserType = session('selected_user_type');

            if ($selectedUserType == 'admin') {
                return redirect()->route('dashboard.admin');
            } else if ($selectedUserType == 'daie') {
                return redirect()->route('dashboard.daie');
            } else if ($selectedUserType== 'mentor') {
                return redirect()->route('dashboard.mentor');
            } else if ($selectedUserType == 'mualaf') {
                return redirect()->route('dashboard.mualaf');
            }
        }
    }

    public function chooseDashboard($userType)
    {
        session(['selected_user_type' => $userType]);
        return redirect()->route('dashboard.' . $userType);
    }
}
