<?php

return [

    /*
    |--------------------------------------------------------------------------
    | FreeToGame API Configuration
    |--------------------------------------------------------------------------
    |
    | This file defines the base URL and available endpoints for the
    | FreeToGame public API (https://www.freetogame.com/api).
    | These values are used by services or HTTP clients to build requests.
    |
    */

    'base_url' => env('FREETOGAME_BASE_URL', 'https://www.freetogame.com/api/'),
    'endpoints' => [
        'all_games' => 'games',
        'specific_game' => 'game?id=',
        'game_by_genre' => 'games?category=',
        'sort_game' => 'games?sort-by=',
    ],
];
