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
        // Forçar português brasileiro para o admin
        app()->setLocale('pt-BR');
        
        // Também definir na sessão para consistência
        session(['lang' => 'pt-BR']);
        
        return $next($request);
    }
}
