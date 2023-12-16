<?php

namespace App\Services;

use App\Models\Game;
use App\Repositories\GameRepository;
use Illuminate\Support\Facades\Log;

/**
 * GameService
 *
 * @todo Fill this class with business logic relating to games, the service layer is responsible for solving
 *   the problems and producing the result.
 */
class GameService {

    public function __construct(protected GameRepository $gameRepo) {
        
    }

    public function getAllGames(): array {
        return $this->gameRepo->getAll();
    }

    public function createGame(string $name, int $user_id): int {
        $game = new Game([
            'name' => $name,
            'user_id' => $user_id,
        ]);

        Log::debug('User id in object: {id}', ['id' => $game->user_id]);

        return $this->gameRepo->create($game);
    }

    public function getGameById(int $id): ?Game {
        return $this->gameRepo->getById($id);
    }

    public function updateGame(int $id, string $name): bool {
        $game = $this->getGameById($id);
        $game->name = $name;
        return $this->gameRepo->update($game);
    }

    public function deleteGame(int $id): bool {
        return $this->gameRepo->delete($id);
    }
}
