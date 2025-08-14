<?php

namespace App\Actions\Post;

use App\Models\Post;

class DeletePostAction
{
    /**
     * Deletes a post.
     *
     * @param Post $post
     * @return bool
     */
    public function execute(Post $post): bool
    {
        return $post->delete();
    }
}
