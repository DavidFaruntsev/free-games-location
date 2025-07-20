<?php

namespace App\Actions\FreeGame;

use App\DataTransferObjects\FreeGameDTO;
use App\Models\FreeGame;

class PersistFreeGameAction
{
    /**
     * Fill and save a FreeGame model based on the given DTO.
     *
     * @param FreeGame $freeGame
     * @param FreeGameDTO $data
     * @return FreeGame
     */
    public function execute(FreeGame $freeGame, FreeGameDTO $data): FreeGame
    {
        $freeGame->fill($data->toArray());
        $freeGame->save();

        return $freeGame;
    }
}
