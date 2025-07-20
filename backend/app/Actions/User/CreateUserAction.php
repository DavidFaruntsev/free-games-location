<?php

namespace App\Actions\User;

use App\DataTransferObjects\UserDTO;
use App\Models\User;

class CreateUserAction
{
    private PersistUserAction $persistUserAction;
    private User $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->persistUserAction = new PersistUserAction();
        $this->user = new User();
    }

    /**
     * Creates and saves a User model based on the DTO.
     *
     * @param UserDTO $data
     * @return User
     */
    public function execute(UserDTO $data): User
    {
        return $this->persistUserAction->execute($this->user, $data);
    }
}
