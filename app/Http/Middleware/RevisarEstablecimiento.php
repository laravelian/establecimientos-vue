<?php

namespace App\Http\Middleware;

use App\Models\Establecimiento;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RevisarEstablecimiento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,): Response
    {

        if (auth()->user()->establecimiento_id !== null) {
            return redirect('/establecimiento/edit');
        }
        return $next($request);
    }
}