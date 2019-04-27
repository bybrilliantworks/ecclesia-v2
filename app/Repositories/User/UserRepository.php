<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $user): User
    {
        return $this->user->create($user);
    }

    public function fetchAll()
    {
        return $this->user->all();
    }

    public function fetchById(int $id): User
    {
        return $this->user->with('church')->find($id);
    }

}
