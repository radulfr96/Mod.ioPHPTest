<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contracts\GameControllerInterface;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/*
 * @OA\
 */

class GameController extends Controller implements GameControllerInterface {

    private GameService $gameService;

    public function __construct(GameService $gameService) {
        $this->gameService = $gameService;
    }

    /**
     * @OA\Get(
     *     path="/api/game/browse",
     *     tags={"Game"},
     *     @OA\Response(response="200", description="Endpoint used to get all games")
     * )
     */
    public function browse(Request $request): JsonResponse {
        $games = $this->gameService->getAllGames();
        return response()->json($games, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/api/game",
     *     tags={"Game"},
     *     @OA\Response(response="200", description="Endpoint to create game")
     * )
     */
    public function create(Request $request): JsonResponse {
        $user_id = $this->GetUserId($request);
        $gameId = $this->gameService->createGame($request->name, $user_id);
        $result = new class {
            
        };
        $result->id = $gameId;
        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/api/game/{id}",
     *     tags={"Game"},
     *     @OA\Response(response="200", description="Endpoint to create game")
     * )
     */
    public function read(Request $request, int $id): JsonResponse {
        $game = $this->gameService->getGameById($id);
        return response()->json($game, Response::HTTP_CREATED);
    }

    /**
     * @OA\Put(
     *     path="/api/game/{id}",
     *     tags={"Game"},
     *     @OA\Response(response="200", description="Endpoint to update a game")
     * )
     */
    public function update(Request $request, int $id): JsonResponse {
        $user_id = $this->GetUserId($request);
        $game = $this->gameService->getGameById($id);
        if ($game->user_id != $user_id) {
            return response('You are not allowed to update this game', 403);
        }

        $updated = $this->gameService->updateGame($request->id, $request->name);
        $result = new class {
            
        };
        $result->updated = $updated;
        return response()->json($result, Response::HTTP_OK);
    }

        /**
     * @OA\Delete(
     *     path="/api/game/{id}",
     *     tags={"Game"},
     *     @OA\Response(response="200", description="Endpoint to delete a game")
     * )
     */
    public function delete(Request $request, int $id): JsonResponse {
        $user_id = $this->GetUserId($request);
        $game = $this->gameService->getGameById($id);
        if ($game->user_id != $user_id) {
            return response('You are not allowed to update this game', 403);
        }
        
        $deleted = $this->gameService->delete($request->id);
        $result->deleted = $deleted;
        return response()->json($result,Response::HTTP_OK);
    }
}
