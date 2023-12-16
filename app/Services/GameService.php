<?php

namespace App\Services;

use App\Repositories\GameRepository;

/**
 * GameService
 *
 * @todo Fill this class with business logic relating to games, the service layer is responsible for solving
 *   the problems and producing the result.
 */
class GameService {

    public function __construct(protected GameRepository $gameRepo) {
        
    }

    public function GetAllGames(): array {
        return $this->gameRepo->getAll();
    }
}
