<?php

namespace App\Actions\Thread;

use App\DataTransferObjects\ThreadDTO;
use App\Models\FreeGame;
use App\Models\Thread;

class PersistThreadAction
{
    /**
     * Fill and save a Thread model based on the given DTO.
     *
     * @param Thread $thread
     * @param ThreadDTO $threadDTO
     * @return Thread
     */
    public function execute(Thread $thread, ThreadDTO $threadDTO): Thread
    {
        $thread->fill($threadDTO->toArray());
        $thread->user()->associate($threadDTO->user_id);

        $freeGame = FreeGame::where('game_id', $threadDTO->free_game_id)->firstOrFail();
        $thread->freeGame()->associate($freeGame);

        $thread->save();

        return $thread;
    }
}
