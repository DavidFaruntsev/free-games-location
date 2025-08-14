<?php

namespace App\Actions\Post;

use App\DataTransferObjects\PostDTO;
use App\Models\Post;

class CreatePostAction
{
    private Post $post;
    private PersistPostAction $persistPostAction;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->post = new Post();
        $this->persistPostAction = new PersistPostAction();
    }

    /**
     * Creates and persists a new post.
     *
     * @param PostDTO $data
     * @return Post
     */
    public function execute(PostDTO $data): Post
    {
        return $this->persistPostAction->execute($this->post, $data);
    }
}
