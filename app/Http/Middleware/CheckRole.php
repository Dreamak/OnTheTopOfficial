<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        foreach($roles as $role) {
            // Assurez-vous que la méthode `hasRole` existe dans le modèle User ou adaptez cette partie.
            if($user->hasRole($role)) {
                return $next($request);
            }
        }
        

        return redirect('home')->with('error', "Vous n'avez pas accès à cette section.");
    }
}
