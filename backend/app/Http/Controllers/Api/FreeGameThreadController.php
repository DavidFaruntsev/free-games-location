<?php

namespace App\Http\Controllers\Api;

use App\Actions\Thread\CreateThreadAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadForm;
use App\Http\Resources\ThreadResource;
use App\Models\FreeGame;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FreeGameThreadController extends Controller
{
    /**
     * Display a paginated list of threads for a specific free game.
     *
     * @param FreeGame $freegame
     * @return AnonymousResourceCollection
     */
    public function index(FreeGame $freegame): AnonymousResourceCollection
    {
        $threads = $freegame->threads()
            ->withCount('posts')
            ->with(['user', 'freeGame'])
            ->latest()
            ->paginate(6);

        return ThreadResource::collection($threads);
    }

    /**
     * Store a newly created thread.
     *
     * @param CreateThreadAction $createThreadAction
     * @param ThreadForm $threadForm
     * @return ThreadResource
     * @throws UnknownProperties
     */
    public function store(CreateThreadAction $createThreadAction, ThreadForm $threadForm): ThreadResource
    {
        $thread = $createThreadAction->execute($threadForm->toDto());
        return new ThreadResource($thread);
    }
}
