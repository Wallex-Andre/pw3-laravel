<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBusinessHours
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $hora = now()->hour;

        if ($hora < 8 || $hora >= 18) {
        return redirect()->route('fora.horario');
    }
        return $next($request);
    }
}