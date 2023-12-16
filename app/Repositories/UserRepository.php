<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * GameRepository
 *
 * @todo Fill this class with logic relating to model/record management for mods, the repository layer is responsible
 *   for solely dealing with the database
 */
class UserRepository extends BaseRepository
{
    public function __construct()
    {
    }
    
    public function getUserByAPIKey(string $apiKey): User
    {
        return User::where('api_key', $apiKey)
                ->first();
    }
}
