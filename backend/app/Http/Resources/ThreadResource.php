<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'posts_count' => $this->posts_count,
            'user' => new UserResource($this->whenLoaded('user')),
            'posts' => PostResource::collection($this->whenLoaded('posts')),
            'free_game' => new FreeGameResource($this->whenLoaded('freeGame')),
        ];
    }
}
