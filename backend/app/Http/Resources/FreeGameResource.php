<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FreeGameResource extends JsonResource
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
            'game_id' => $this->game_id,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail ?? null,
            'short_description' => $this->short_description ?? null,
            'game_url' => $this->game_url ?? null,
            'genre' => $this->genre ?? null,
            'platform' => $this->platform ?? null,
            'release_date' => $this->release_date ?? null,
            'publisher' => $this->publisher ?? null,
        ];
    }
}
