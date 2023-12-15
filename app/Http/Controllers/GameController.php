<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contracts\GameControllerInterface;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GameController extends Controller implements GameControllerInterface
{
    private GameService $gameService;
    

    public function __construct(GameService $gameService)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/game/browse",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function browse(Request $request): JsonResponse
    {
        return response()->json(['Name' => 'Uncharted'], 200);
        // TODO: Implement browse() method.
    }

    public function create(Request $request): JsonResponse
    {
        // TODO: Implement create() method.
    }

    public function read(Request $request, Game $game): JsonResponse
    {
        // TODO: Implement read() method.
    }

    public function update(Request $request, Game $game): JsonResponse
    {
        // TODO: Implement update() method.
    }

    public function delete(Request $request, Game $game): JsonResponse
    {
        // TODO: Implement delete() method.
    }
}
