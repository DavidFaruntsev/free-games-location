<?php

namespace App\DataTransferObjects;

use PHPExperts\SimpleDTO\SimpleDTO;

/**
 * Class UserDTO
 *
 * Data Transfer Object for representing a user.
 *
 * @property-read string $username
 * @property-read string $email
 * @property-read string $password
 * @property-read ?string $avatar
 * @property-read ?string $role
 */
class UserDTO extends SimpleDTO
{
    protected string $username;
    protected string $email;
    protected string $password;
    protected string $avatar;
    protected string $role;
}
