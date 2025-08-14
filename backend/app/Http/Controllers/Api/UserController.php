<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{
    /**
     * Display the user resource.
     *
     * @param Request $request
     * @return UserResource
     */
    public function show(Request $request): UserResource
    {
        return new UserResource($request->user());
    }
}
