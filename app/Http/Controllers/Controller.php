<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use OpenApi\Attributes as OA;

#[
    OA\Info(version: "1.0.0", description: "modio test api", title: "Mod.io Test API Documentation"),
    OA\Server(url: 'http://localhost:8000', description: "local server"),
    OA\SecurityScheme(securityScheme: 'ApiKeyAuth', type: "apiKey", name: "Authorization", in: "header", scheme: "ApiKeyAuth"),
]
class Controller extends BaseController {

    use AuthorizesRequests,
        ValidatesRequests;

    protected function getUserId(Request $request): ?int 
    {
        $apiKey = $request->header('Authorization');
        
        if (!$apiKey)
        {
            return null;
        }
        
        $userRepo = new UserRepository();
        
        $user = $userRepo->getUserByAPIKey($apiKey);
        
        if (!$user) {
            return null;
        }
        
        return $user->id;
    }
}
