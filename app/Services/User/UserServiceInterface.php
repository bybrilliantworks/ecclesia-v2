<?php

namespace App\Services\User;

use App\User;

interface UserServiceInterface
{

    public function createUser(array $user): array;

    public function listUsers();

    public function getUser(int $id): User;

}
