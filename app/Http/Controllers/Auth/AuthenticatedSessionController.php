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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
        $user = Auth::user();
        $userType = $user->userType();

        // Redirect to the appropriate home page based on user type
        if ($userType === 'admin') {
            return redirect()->route('home');
        } else{
            return redirect()->route('login')->with('error', 'Invalid user type or credentials.');
        }
        
        if ($userType === 'mentor') {
            return redirect()->route('home');
        } else{
            return redirect()->route('login')->with('error', 'Invalid user type or credentials.');
        }

        if ($userType === 'daie') {
            return redirect()->route('home');
        } else{
            return redirect()->route('login')->with('error', 'Invalid user type or credentials.');
        }

        if ($userType === 'mualaf') {
            return redirect()->route('home');
        } else{
            return redirect()->route('login')->with('error', 'Invalid user type or credentials.');
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
