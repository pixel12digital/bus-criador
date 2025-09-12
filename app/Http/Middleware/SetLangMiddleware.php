<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use App;

class SetLangMiddleware
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
            return $next($request);
        }

        if (session()->has('lang')) {
           app()->setLocale(session()->get('lang'));
        } else {
           $defaultLang = Language::where('is_default', 1)->first();
           if (!empty($defaultLang)) {
             app()->setLocale($defaultLang->code);
           } else {
             // Fallback para português se não encontrar idioma padrão
             app()->setLocale('pt-BR');
           }
        }

        return $next($request);
    }
}
