<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class VerifyUserTypeIsAdmin
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
        if ($request->user()->usertype !== 'admin' && $request->user()->usertype !== 'Superadmin') {
            return abort(403, __('non sei autrorizzato a visitare questa pagina'));
        }

        return $next($request);
    }
}
