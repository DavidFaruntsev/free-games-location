<?php

namespace App\Http\Controllers;

use App\Http\Resources\FreeGameResource;
use App\Models\FreeGame;
use App\services\FreeToGameService;
use Illuminate\Http\Request;

class FreeGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allFreeGames = FreeGame::paginate(15);
        return FreeGameResource::collection($allFreeGames);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FreeGame $freeGame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FreeGame $freeGame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FreeGame $freeGame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FreeGame $freeGame)
    {
        //
    }
}
