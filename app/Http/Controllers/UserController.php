<?php

namespace App\Http\Controllers;

use App\Actions\User\CreateUserAction;
use App\Http\Requests\RegisterForm;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(RegisterForm $registerForm, CreateUserAction $createUserAction, )
    {
        $user = $createUserAction->execute($registerForm->toDto());
        return new UserResource($user);
    }
}
