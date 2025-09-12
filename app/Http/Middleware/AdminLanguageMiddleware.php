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
        // Sempre usar português brasileiro como padrão localmente
        if (app()->environment('local')) {
            app()->setLocale('pt-BR');
            session(['lang' => 'pt-BR']);
            return $next($request);
        }
        
        // Para produção, usar português como padrão do admin
        app()->setLocale('pt-BR');
        session(['lang' => 'pt-BR']);
        
        return $next($request);
    }
}
