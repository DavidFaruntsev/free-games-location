<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FreeGameDTO extends DataTransferObject
{
    public int $game_id;
    public string $title;
    public string $thumbnail;
    public string $short_description;
    public string $game_url;
    public string $genre;
    public string $platform;
    public string $publisher;
    public string $developer;
    public string $release_date;
    public string $freetogame_profile_url;
}
