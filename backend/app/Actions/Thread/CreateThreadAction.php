<?php

namespace App\Actions\Thread;

use App\DataTransferObjects\ThreadDTO;
use App\Models\Thread;

class CreateThreadAction
{
    private Thread $thread;
    private PersistThreadAction $persistThreadAction;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->thread = new Thread();
        $this->persistThreadAction = new PersistThreadAction();
    }

    /**
     * Creates and persists a new thread.
     *
     * @param ThreadDTO $data
     * @return Thread
     */
    public function execute(ThreadDTO $data): Thread
    {
        return $this->persistThreadAction->execute($this->thread, $data);
    }
}
