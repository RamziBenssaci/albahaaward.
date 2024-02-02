<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // check if the user is logged in
        if (auth()->check() && auth()->user()->status == 0) {
            auth()->logout();
            toastr()->error('حسابك معلق. يرجى الاتصال بالدعم.', 'خطأ');
            return redirect(route('login'));
        }
        return $next($request);
    }
}
