<?php

namespace App\Actions\User;

use App\DataTransferObjects\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PersistUserAction
{
    /**
     * Fill and save a User model based on the given DTO.
     *
     * @param User $user
     * @param UserDTO $data
     * @return User
     */
    public function execute(User $user, UserDTO $data): User
    {
        $user->username = $data->username;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);

        $user->save();

        return $user;
    }
}
