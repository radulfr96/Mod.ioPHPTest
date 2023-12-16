<?php

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

/**
 * GameRepository
 *
 * @todo Fill this class with logic relating to model/record management for games, the repository layer is responsible
 *   for solely dealing with the database
 */
class GameRepository extends BaseRepository
{    
    function __construct()
    {
    }
    
    public function getAll(): array
    {
        return Game::all()->toArray();
    }
    
    public function create(Model $model): int {
        
    }

    public function delete(int $id) {
        
    }

    public function getById(int $id): Model {
        
    }

    public function updated(Model $model): bool {
        
    }
}
