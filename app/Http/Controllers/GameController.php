<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contracts\GameControllerInterface;
use App\Services\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

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
     *     tags={"Games"},
     *     @OA\Response(response="200", description="Endpoint used to get all games"),
     * @OA\Parameter (
     *  name="page",
     *     in="query",
     *     description="Page of results to return",
     *     required=false),
     * )
     */
    public function browse(int $page = 1): JsonResponse {
        Log::debug('Received currentPage value of: {page}', [$page]);
        $games = $this->gameService->getAllGames($page);
        return response()->json($games, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/api/games",
     *     tags={"Games"},
     *     @OA\Response(response="200", description="Endpoint to create game")
     * )
     */
    public function create(Request $request): JsonResponse {
        $user_id = $this->GetUserId($request);
        $gameId = $this->gameService->createGame($request->name, $user_id);
        $result = new class {
            
        };
        $result->id = $gameId;
        return response()->json($result, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/api/games/{id}",
     *     tags={"Games"},
     *  @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Id of the game to update",
     *     required=true),
     *  @OA\Response(response="200", description="Endpoint to create game")
     * )
     */
    public function read(int $id): JsonResponse {
        $game = $this->gameService->getGameById($id);
        return response()->json($game, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/api/games/{id}",
     *     tags={"Games"},
     * @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Id of the game to update",
     *         required=true,
     *      ),
     * @OA\Response(response="200", description="Endpoint to update a game")
     * )
     */
    public function update(Request $request, $id): JsonResponse {
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
     *     path="/api/games/{id}",
     *     tags={"Games"},
     *     @OA\Response(response="200", description="Endpoint to delete a game")
     * )
     */
    public function delete(Request $request, int $id): JsonResponse {
        $user_id = $this->GetUserId($request);
        $game = $this->gameService->getGameById($id);

        if (!$game) {
            $result = new class {
                
            };
            $result->deleted = true;
            return response()->json($result, Response::HTTP_OK);
        }

        if ($game->user_id != $user_id) {
            return response('You are not allowed to update this game', 403);
        }

        $deleted = $this->gameService->deleteGame($request->id);
        $result = new class {
            
        };
        $result->deleted = $deleted;
        return response()->json($result, Response::HTTP_OK);
    }
}
