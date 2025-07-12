<?php

namespace App\DataTransferObjects;

use PHPExperts\SimpleDTO\SimpleDTO;

/**
 * Class FreeGameDTO
 *
 * Data Transfer Object for representing a free game.
 *
 * @property-read int $game_id
 * @property-read string $title
 * @property-read string $thumbnail
 * @property-read string $short_description
 * @property-read string $game_url
 * @property-read string $genre
 * @property-read string $platform
 * @property-read string $publisher
 * @property-read string $developer
 * @property-read string $release_date
 * @property-read string $freetogame_profile_url
 */
class FreeGameDTO extends SimpleDTO
{
    protected int $game_id;
    protected string $title;
    protected string $thumbnail;
    protected string $short_description;
    protected string $game_url;
    protected string $genre;
    protected string $platform;
    protected string $publisher;
    protected string $developer;
    protected string $release_date;
    protected string $freetogame_profile_url;
}
