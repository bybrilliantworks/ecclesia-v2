<?php

namespace App\Repositories\User;

use App\User;

interface UserRepositoryInterface
{
    public function create(array $user): User;

    public function fetchAll();

    public function fetchById(int $id): User;
}
