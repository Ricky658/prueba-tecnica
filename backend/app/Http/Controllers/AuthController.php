<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\UseCases\Auth\LoginUseCase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller {
    public function __construct(private LoginUseCase $loginUseCase) {}

    public function login(Request $request) {
        try {
            $token = $this->loginUseCase->execute(
                $request->input('email'),
                $request->input('password')
            );

            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
