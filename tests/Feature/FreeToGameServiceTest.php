<?php

namespace Tests\Feature;

use App\Models\FreeGame;
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

        // Make one fake game
        $this->fakeGames = FreeGame::factory()->count(2)->make()->toArray();

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

        // Get free games from API
        $result = $this->service->allFreeGames();

        // Asserts
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(2, $result);
        $this->assertEquals($this->fakeGames[0]['id'], $result[0]['id']);
        $this->assertEquals($this->fakeGames[0]['title'], $result[0]['title']);
        $this->assertEquals($this->fakeGames[1]['developer'], $result[1]['developer']);
    }
}
