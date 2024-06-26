<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if($request->user()->role!==$role){
            if($request->user()->role ==='recruteur'){
                return redirect()->route('recruteur.dashboard');
            }elseif($request->user()->role==='candidat'){
                return redirect()->route('candidat.dashboard');
            }elseif($request->user()->role ==='admin'){
                return redirect()->route('admin.dashboard');
            }

        }
        return $next($request);
    }
}
