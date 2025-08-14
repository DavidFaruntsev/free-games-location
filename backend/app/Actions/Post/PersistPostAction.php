<?php

namespace App\Actions\Post;

use App\DataTransferObjects\PostDTO;
use App\Models\Post;

class PersistPostAction
{
    /**
     * Fill and save a Post model based on the given DTO.
     *
     * @param Post $post
     * @param PostDTO $postDTO
     * @return Post
     */
    public function execute(Post $post, PostDTO $postDTO): Post
    {
        $post->fill($postDTO->toArray());
        $post->user()->associate($postDTO->user_id);

        $post->thread()->associate($postDTO->thread_id);

        $post->save();

        return $post;
    }
}
