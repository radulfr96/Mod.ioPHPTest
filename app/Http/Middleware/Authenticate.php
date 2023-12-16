<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use \App\Repositories\UserRepository;

class Authenticate extends Middleware {
        
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards) {
        $apiKey = $request->header('Authorization');

        if (!$apiKey) {
            abort(403, 'Access denied');
        }
        
        $userRepo = new UserRepository();
        
        $user = $userRepo->getUserByAPIKey($apiKey);
        
        if (!$user)
        {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
