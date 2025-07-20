<?php

namespace Tests\Feature;

use App\services\FreeToGameService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

class UpdateFreeGamesCommandTest extends TestCase
{
    use RefreshDatabase;

    protected FreeToGameService $mockService;
    protected $fakeGame;

    protected function setUp(): void
    {
        parent::setUp();

        // Make one fake game
        $this->fakeGame = [
            'id' => 1234,
            'title' => 'Test Game',
            'thumbnail' => 'https://example.com/thumb.jpg',
            'short_description' => 'Test description',
            'game_url' => 'https://example.com/game',
            'genre' => 'Action',
            'platform' => 'PC',
            'publisher' => 'Test Publisher',
            'developer' => 'Test Developer',
            'release_date' => '2023-01-01',
            'freetogame_profile_url' => 'https://example.com/profile',
        ];

        // Make mock of service class
        $this->mockService = Mockery::mock(FreeToGameService::class);
        $this->mockService->shouldReceive('allFreeGames')
            ->once()
            ->andReturn(collect([$this->fakeGame]));

        $this->app->instance(FreeToGameService::class, $this->mockService);
    }

    public function test_command_calls_free_to_game_service_and_saves_games()
    {
        // Call command
        Artisan::call('freegame:update-free-games');

        // Assert
        $this->assertDatabaseHas('free_games', [
            'game_id' => $this->fakeGame['id'],
            'title' => $this->fakeGame['title'],
            'thumbnail' => $this->fakeGame['thumbnail'],
            'short_description' => $this->fakeGame['short_description'],
            'game_url' => $this->fakeGame['game_url'],
            'genre' => $this->fakeGame['genre'],
            'platform' => $this->fakeGame['platform'],
            'publisher' => $this->fakeGame['publisher'],
            'developer' => $this->fakeGame['developer'],
            'release_date' => $this->fakeGame['release_date'],
            'freetogame_profile_url' => $this->fakeGame['freetogame_profile_url'],
        ]);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
