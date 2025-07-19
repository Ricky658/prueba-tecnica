<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    public function findByEmail(string $email): ?User {
        return User::where('email', $email)->first();
    }
}
