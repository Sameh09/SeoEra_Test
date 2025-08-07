<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\API\LoginRequest;
use App\Http\Requests\Auth\API\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $this->authService->register($request->validated());
        return response()->json($data, 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $data = $this->authService->login($request->only(['mobile', 'password']));

        if (!$data) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json($data);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function refresh(): JsonResponse
    {
        $token = $this->authService->refresh();
        return response()->json(['token' => $token]);
    }

    public function me(): JsonResponse
    {
        $user = $this->authService->me();
        return response()->json(compact('user'));
    }
}
