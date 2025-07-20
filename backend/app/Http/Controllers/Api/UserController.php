<?php

namespace App\Http\Controllers\Api;

use App\Actions\User\CreateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(RegisterForm $registerForm, CreateUserAction $createUserAction)
    {
        $user = $createUserAction->execute($registerForm->toDto());

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'message' => 'Registratie succesvol'
        ], 201);
    }

    public function login(LoginForm $loginForm)
    {
        $credentials = $loginForm->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['De opgegeven inloggegevens zijn onjuist.'],
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'message' => 'Inloggen succesvol'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Uitgelogd'
        ]);
    }

    public function me(Request $request)
    {
        return new UserResource($request->user());
    }
}
