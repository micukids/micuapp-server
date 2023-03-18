<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ApiAdminMiddleware
{
 
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if(auth()->user()->tokenCan('server:admin')){
                return $next($request);
            }else{
                return response()->json([
                    'message' => 'Acceso no autorizado, No eres el Admin.',
                ], 403);
            }
        }else {
            return response()->json([
                'status'=> 401,
                'message' => 'Por favor logeate',
            ]);
        }
       
    }
}
