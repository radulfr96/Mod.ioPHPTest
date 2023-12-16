<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * BaseRepository
 *
 * @todo Fill this class with common logic relating to model/record management that can be shared amongst other
 *   repositories.
 */
abstract class BaseRepository
{
    abstract public function getAll(): array;
    abstract public function getById(int $id): Model;
    abstract public function create(Model $model): int;
    abstract public function updated(Model $model): bool;
    abstract public function delete(int $id);
    
}
