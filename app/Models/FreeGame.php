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
        'api_id',
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
     * @return BelongsToMany<User>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany<Thread>
     */
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }
}
