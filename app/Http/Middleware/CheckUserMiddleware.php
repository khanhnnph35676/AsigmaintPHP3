<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == '2'|| Auth::user()->role == NULL || Auth::user()->role == ''){
                return $next($request);
            }
        }
        return redirect()->route('loginUser')->with([
            'mesErr' => 'Bạn nhập chưa đúng mật khẩu hoặc email của tài khoản'
        ]);
    }
}
