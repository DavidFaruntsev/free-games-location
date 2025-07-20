<?php

namespace App\services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class FreeToGameService
{
    /**
     * Make an HTTP GET request to the FreeToGame API using a relative endpoint.
     *
     * @param string $endpoint Relative endpoint to append to the base API URL.
     * @return array Decoded JSON response as associative array.
     */
    public function fetchGamesData(string $endpoint): array
    {
        $baseUrl = config('freetogame.base_url');
        return Http::get($baseUrl . $endpoint)->json();
    }

    /**
     * Retrieve a full list of games from the FreeToGame API.
     *
     * @return Collection Laravel collection of game data.
     */
    public function allFreeGames(): Collection
    {
        $allGamesEndpoint = config('freetogame.endpoints.all_games');
        $allGamesData = $this->fetchGamesData($allGamesEndpoint);
        return collect($allGamesData);
    }
}
