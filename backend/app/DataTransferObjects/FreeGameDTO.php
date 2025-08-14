<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Data Transfer Object for FreeGame.
 *
 * Represents the structure of a free game entity.
 */
class FreeGameDTO extends DataTransferObject
{
    /** @var int The unique game identifier */
    public int $game_id;

    /** @var string The game's title */
    public string $title;

    /** @var ?string URL to the game's thumbnail image */
    public ?string $thumbnail = null;

    /** @var ?string Short description of the game */
    public ?string $short_description = null;

    /** @var string URL to the game's page */
    public string $game_url;

    /** @var ?string The genre of the game */
    public ?string $genre = null;

    /** @var ?string Supported platforms */
    public ?string $platform = null;

    /** @var ?string Publisher name */
    public ?string $publisher = null;

    /** @var ?string Developer name */
    public ?string $developer = null;

    /** @var ?string Release date */
    public ?string $release_date = null;

    /** @var ?string URL to the FreeToGame profile */
    public ?string $freetogame_profile_url = null;
}
