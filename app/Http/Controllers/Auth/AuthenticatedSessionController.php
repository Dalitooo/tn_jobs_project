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

        if($request->user()->role ==='recruteur'){
            
            if (! Auth::user()->recruteur()->exists()) {
                return redirect()->route('recruteur.create');
            }
            return redirect()->intended(Route('recruteur.dashboard'));
        }

        if( auth()->user()->role ==='candidat'){
            if (!$request->user()->candidat()->exists()) {
                return redirect()->route('candidat.create');
            }
            return redirect()->intended(route('candidat.dashboard'));
        }

        if($request->user()->role ==='admin'){
            return redirect()->intended(route('admin.dashboard'));
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
