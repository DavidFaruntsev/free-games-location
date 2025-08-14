<?php

namespace App\Actions\FreeGame;

use App\DataTransferObjects\FreeGameDTO;
use App\Models\FreeGame;

class CreateFreeGameAction
{
    private PersistFreeGameAction $persistFreeGameAction;
    private FreeGame $freeGame;

    /**
     *
     */
    public function __construct()
    {
        $this->persistFreeGameAction = new PersistFreeGameAction();
        $this->freeGame = new FreeGame();
    }

    /**
     * Creates and saves a FreeGame model based on the DTO.
     *
     * @param FreeGameDTO $data
     * @return FreeGame
     */
    public function execute(FreeGameDTO $data): FreeGame
    {
        return $this->persistFreeGameAction->execute($this->freeGame, $data);
    }
}
