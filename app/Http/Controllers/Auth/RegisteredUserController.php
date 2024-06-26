<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'account_type'=>['required','in:candidat,recruteur']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->account_type
        ]);

        event(new Registered($user));

        Auth::login($user);

        if($request->user()->role ==='recruteur'){
            if (!$request->user()->recruteur()->exists()) {
                return redirect()->route('recruteur.create');
            }
            return redirect()->intended('recruteur.dashboard');

        }if($request->user()->role ==='candidat'){
            if (!$request->user()->candidat()->exists()) {
                return redirect()->route('candidat.create');
            }
            return redirect()->intended('candidat.dashboard');

        }elseif(auth()->user()->role==='admin'){
            return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
