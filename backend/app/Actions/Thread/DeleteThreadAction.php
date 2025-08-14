<?php

namespace App\Actions\Thread;

use App\Models\Thread;

class DeleteThreadAction
{
    /**
     * Deletes a thread.
     *
     * @param Thread $thread
     * @return bool
     */
    public function execute(Thread $thread): bool
    {
        return $thread->delete();
    }
}
