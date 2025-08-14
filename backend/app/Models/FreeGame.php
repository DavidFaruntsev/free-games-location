<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FreeGame extends Model
{
    /** @use HasFactory<\Database\Factories\FreeGameFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'game_id',
        'title',
        'thumbnail',
        'short_description',
        'game_url',
        'genre',
        'platform',
        'publisher',
        'developer',
        'release_date',
        'freetogame_profile_url',
    ];

    /**
     * The users who have saved this free game.
     *
     * @return BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The threads associated with this free game.
     *
     * @return HasMany<Thread>
     */
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Get the route key for model binding.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'game_id';
    }
}
