<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecificGameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->resource['title'],
            'thumbnail' => $this->resource['thumbnail'] ?? null,
            'game_url' => $this->resource['game_url'] ?? null,
            'genre' => $this->resource['genre'] ?? null,
            'platform' => $this->resource['platform'] ?? null,
            'publisher' => $this->resource['publisher'] ?? null,
            'developer' => $this->resource['developer'] ?? null,
            'release_date' => $this->resource['release_date'] ?? null,
            'status' => $this->resource['status'] ?? null,
            'description' => $this->resource['description'] ?? null,
            'screenshots' => FreeGameScreenshotResource::collection($this->resource['screenshots']) ?? null,
        ];
    }
}
