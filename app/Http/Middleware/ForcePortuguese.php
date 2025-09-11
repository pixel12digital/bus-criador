<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForcePortuguese
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Forçar sempre português
        session()->put('user_lang', 'pt');
        app()->setLocale('pt');
        
        return $next($request);
    }
}
