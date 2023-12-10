<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function chooseDashboard()
    {
        $user = Auth::user();
        $userTypes = explode(',', $user->userType());
        $name = $user->name;
    
        if (in_array('admin', $userTypes)) {
            return redirect()->route('dashboard.admin');
        } else {
            return view('choose_dashboard', compact('userTypes', 'name'));
        }
    }

    // public function chooseDashboard()
    // {
    //     $user = Auth::user();
    //     $userTypes = explode(',', $user->userType());

    //     return view('choose_dashboard', compact('userTypes'));
    // }

    // public function store(LoginRequest $request): RedirectResponse
    // {

    //     try {
    //         $request->authenticate();

    //         $request->session()->regenerate();

    //         $user = Auth::user();

    //         if (!$user) {
    //             // Authentication failed, redirect back with an error message
    //             return redirect()->route('login')->with('error', trans('auth.failed'));
    //         }

    //         $userType = $user->userType();

    //         // Redirect to the appropriate home page based on user type
    //         if ($userType === 'admin') {
    //             return redirect()->route('home');
    //         } elseif ($userType === 'mentor') {
    //             return redirect()->route('home');
    //         } elseif ($userType === 'daie') {
    //             return redirect()->route('home');
    //         } elseif ($userType === 'mualaf') {
    //             return redirect()->route('home');
    //         } else {
    //             return redirect()->route('login')->with('error', trans('auth.failed'));
    //         }
    //     } catch (AuthenticationException $exception) {
    //         // Handle authentication exception
    //         return redirect()->route('login')->with('error', trans('auth.failed'));
    //     }
    // }

    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            $user = Auth::user();

            if (!$user) {
                // Authentication failed, redirect back with an error message
                return redirect()->route('login')->with('error', trans('auth.failed'));
            }

            return redirect()->route('dashboard.choose');
        } catch (AuthenticationException $exception) {
            // Handle authentication exception
            return redirect()->route('login')->with('error', trans('auth.failed'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->forget('selected_user_type');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
