<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\NotImplementedException;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function create(Model $model): int {
        throw new NotImplementedException('Not implemented');
    }

    public function delete(int $id): bool {
        throw new NotImplementedException('Not implemented');
    }

    public function getAll(int $currentPage = 1): LengthAwarePaginator {
        throw new NotImplementedException('Not implemented');
    }

    public function getById(int $id): ?Model {
        throw new NotImplementedException('Not implemented');
    }

    public function update(Model $model): bool {
        throw new NotImplementedException('Not implemented');
    }
}
