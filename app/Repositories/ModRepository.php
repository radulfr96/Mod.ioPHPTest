<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * GameRepository
 *
 * @todo Fill this class with logic relating to model/record management for mods, the repository layer is responsible
 *   for solely dealing with the database
 */
class ModRepository extends BaseRepository
{
    private ModRepository $modRepo;

    public function __construct(ModRepository $modRepo)
    {
    }

    public function create(Model $model): int {
        
    }

    public function delete(int $id): bool {
        
    }

    public function getAll(): array {
        
    }

    public function getById(int $id): ?Model {
        
    }

    public function update(Model $model): bool {
        
    }
}
