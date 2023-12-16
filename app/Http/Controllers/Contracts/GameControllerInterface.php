<?php

namespace App\Http\Controllers\Contracts;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * GameControllerInterface.
 */
interface GameControllerInterface
{
    /**
     * Browse Games.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function browse(Request $request) : JsonResponse;

    /**
     * Create game.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse;

    /**
     * Read/view a game.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function read(int $id) : JsonResponse;

    /**
     * Update a game.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id) : JsonResponse;

    /**
     * Delete a game.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function delete(Request $request, $id) : JsonResponse;
}
