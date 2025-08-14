<?php

namespace Tests\Feature;

use App\services\FreeToGameService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FreeToGameServiceTest extends TestCase
{
    protected $fakeGame;
    protected FreeToGameService $service;

    protected function setUp(): void
    {
        parent::setUp();

        // Make two fake free-games
        $this->fakeGames = [
            [
                'id' => 1234,
                'title' => 'Test Game 1',
                'thumbnail' => 'https://example.com/thumb1.jpg',
                'short_description' => 'Test description 1',
                'game_url' => 'https://example.com/game1',
                'genre' => 'Action',
                'platform' => 'PC',
                'publisher' => 'Test Publisher 1',
                'developer' => 'Test Developer 1',
                'release_date' => '2023-01-01',
                'freetogame_profile_url' => 'https://example.com/profile1',
            ],
            [
                'id' => 5678,
                'title' => 'Test Game 2',
                'thumbnail' => 'https://example.com/thumb2.jpg',
                'short_description' => 'Test description 2',
                'game_url' => 'https://example.com/game2',
                'genre' => 'RPG',
                'platform' => 'Browser',
                'publisher' => 'Test Publisher 2',
                'developer' => 'Test Developer 2',
                'release_date' => '2023-02-01',
                'freetogame_profile_url' => 'https://example.com/profile2',
            ]
        ];

        // Make service to test
        $this->service = new FreeToGameService();

    }

    public function test_service_can_get_free_games()
    {
        // Fake http call
        Http::fake([
            config('freetogame.base_url') . config('freetogame.endpoints.all_games') =>
                Http::response($this->fakeGames, 200),
        ]);

        // Get free free-games from API
        $result = $this->service->allFreeGames();

        // Asserts
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(2, $result);
        $this->assertEquals($this->fakeGames[0]['id'], $result[0]['id']);
        $this->assertEquals($this->fakeGames[0]['title'], $result[0]['title']);
        $this->assertEquals($this->fakeGames[1]['developer'], $result[1]['developer']);
    }
}
