<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Data Transfer Object for Thread.
 *
 * Represents a discussion thread related to a free game.
 */
class ThreadDTO extends DataTransferObject
{
    /** @var string The thread's title */
    public string $title;

    /** @var ?string A short description of the thread */
    public ?string $description = null;

    /** @var int The ID of the user who created the thread */
    public int $user_id;

    /** @var int The ID of the related free game */
    public int $free_game_id;
}
