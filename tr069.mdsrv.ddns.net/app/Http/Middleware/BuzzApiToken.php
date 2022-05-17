<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
class BuzzApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if($request->bearerToken()){
             try {
    $token = Crypt::decryptString($request->bearerToken());
    
    $datatoken = env('APP_TOKEN');
    $host = $request->server('HTTP_ORIGIN');

        
        if($token === $datatoken){
            return $next($request);
        }
                  return response([
            'message' => 'Unauthenticated'
        ], 403);
        
    } catch (DecryptException $e) {
    return response([
            'message' => 'Unauthenticated'
        ], 403);
    }
    
    
        }else{
            return response([
            'message' => 'Unauthenticated'
        ], 403);
        }
 
    }
}
