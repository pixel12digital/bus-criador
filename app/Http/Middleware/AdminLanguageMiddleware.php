<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use App;

class AdminLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Forçar português (ID 176) para o admin
        app()->setLocale('en');
        
        // Também definir na sessão para consistência
        session(['lang' => 'en']);
        
        return $next($request);
    }
}
