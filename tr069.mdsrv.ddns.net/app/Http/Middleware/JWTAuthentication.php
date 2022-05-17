<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lcobucci\JWT\Token;
use PhpParser\Node\Stmt\TryCatch;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class JWTAuthentication
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

        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof TokenExpiredException) {
                $newToken = JWTAuth::parseToken()->refresh();
                return response()->json(['success' => false, 'access_token' => $newToken, 'user' => Auth::user(), 'status' => 'expired'], 200);
            } else if ($e instanceof TokenInvalidException) {
                return response()->json(['success' => false, 'message' => 'token Invalid'], 401);
            } else {
                return response()->json(['success' => false, 'message' => 'token Not found'], 401);
            }
        }

        return $next($request);
    }
}
