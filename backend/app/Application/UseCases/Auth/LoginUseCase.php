<?php

namespace App\Application\UseCases\Auth;

use App\Domain\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginUseCase {
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function execute(string $email, string $password): string {
        $user = $this->userRepository->findByEmail($email);
        if (!$user || !Hash::check($password, $user->password)) {
            throw new \Exception("Credenciales inválidas");
        }

        return JWTAuth::fromUser($user);
    }
}
