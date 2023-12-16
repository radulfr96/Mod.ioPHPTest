<?php

namespace App\Repositories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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
        $model->save();
        return $model->id;
    }

    public function delete(int $id): bool {
        $gameToDelete = Game::find('id',$id);
        
        if (!$gameToDelete) {
            return true;
        }
        
        return $gameToDelete->delete();
    }

    public function getById(int $id): Model {
        return Game::where('id', $id)->first();
    }

    public function update(Model $model): bool {
        return $model->save();
    }
}
