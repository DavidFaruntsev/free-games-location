<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public string $username;
    public string $email;
    public string $password;
    public ?string $avatar;
    public string $role = 'user';
}
