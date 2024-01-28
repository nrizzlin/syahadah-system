<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Cache;
use App\Models\User;


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

        if (Auth::check()) {
            Cache::forget('user-online-' . Auth::user()->id);
    
            // Update last_seen timestamp
            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }

        Auth::guard('web')->logout();
        $request->session()->forget('selected_user_type');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
