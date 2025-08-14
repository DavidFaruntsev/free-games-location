<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Data Transfer Object for User.
 *
 * Represents user data used in business logic or service layers.
 */
class UserDTO extends DataTransferObject
{
    /** @var string Unique username */
    public string $username;

    /** @var string User email */
    public string $email;

    /** @var string Hashed password */
    public string $password;

    /** @var ?string URL to avatar image */
    public ?string $avatar = null;

    /** @var string User role, defaults to 'user' */
    public string $role = 'user';
}
