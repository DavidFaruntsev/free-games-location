<?php

namespace App\Http\Controllers\Api;

use App\Actions\User\CreateUserAction;
use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param RegisterForm $registerForm
     * @param CreateUserAction $createUserAction
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function register(RegisterForm $registerForm, CreateUserAction $createUserAction): JsonResponse
    {
        $user = $createUserAction->execute($registerForm->toDto());
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'message' => 'Registration successful!'
        ], HttpStatus::CREATED->value);
    }

    /**
     * Handle user login.
     *
     * @param LoginForm $loginForm
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(LoginForm $loginForm): JsonResponse
    {
        $credentials = $loginForm->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials.'],
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'message' => 'Login successful!'
        ], HttpStatus::OK->value);
    }

    /**
     * Handle user logout.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out!'
        ], HttpStatus::OK->value);
    }
}
