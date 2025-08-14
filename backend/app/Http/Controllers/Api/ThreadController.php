<?php

namespace App\Http\Controllers\Api;

use App\Actions\Thread\DeleteThreadAction;
use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ThreadController extends Controller
{
    /**
     * Display a listing of all threads (for all freegames).
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $threads = Thread::with(['user', 'freeGame'])
            ->withCount('posts')
            ->latest()
            ->paginate(6);

        return ThreadResource::collection($threads);
    }

    /**
     * Display a single thread, including its posts and related data.
     *
     * @param Thread $thread
     * @return ThreadResource
     */
    public function show(Thread $thread): ThreadResource
    {
        $thread->load(['user', 'freeGame', 'posts.user']);

        return new ThreadResource($thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Thread $thread
     * @param DeleteThreadAction $deleteThreadAction
     * @return JsonResponse
     */
    public function destroy(Thread $thread, DeleteThreadAction $deleteThreadAction): JsonResponse
    {
        $deleteThreadAction->execute($thread);
        return response()->json(['message' => 'Thread deleted successfully'], HttpStatus::NO_CONTENT->value);
    }
}
