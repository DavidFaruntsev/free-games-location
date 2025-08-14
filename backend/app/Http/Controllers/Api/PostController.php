<?php

namespace App\Http\Controllers\Api;

use App\Actions\Post\CreatePostAction;
use App\Actions\Post\DeletePostAction;
use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostForm;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostAction $createPostAction
     * @param PostForm $postForm
     * @return PostResource
     */
    public function store(CreatePostAction $createPostAction, PostForm $postForm): PostResource
    {
        $post = $createPostAction->execute($postForm->toDto());
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @param DeletePostAction $deletePostAction
     * @return JsonResponse
     */
    public function destroy(Post $post, DeletePostAction $deletePostAction): JsonResponse
    {
        $deletePostAction->execute($post);

        return response()->json(['message' => 'Post deleted successfully'], HttpStatus::OK->value);
    }
}
