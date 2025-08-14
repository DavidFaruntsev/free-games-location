<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FreeGameResource;
use App\Http\Resources\SpecificGameResource;
use App\Models\FreeGame;
use App\services\FreeToGameService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FreeGameController extends Controller
{
    /**
     * Constructor.
     *
     * @param FreeToGameService $freeToGameService
     */
    public function __construct(
        private FreeToGameService $freeToGameService,
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $allFreeGames = FreeGame::paginate(15);
        return FreeGameResource::collection($allFreeGames);
    }

    /**
     * Display the specified resource.
     *
     * @param FreeGame $freegame
     * @return SpecificGameResource
     */
    public function show(FreeGame $freegame): SpecificGameResource
    {
        $specificGame = $this->freeToGameService->specificFreeGame($freegame->game_id);
        return new SpecificGameResource($specificGame);
    }
}
