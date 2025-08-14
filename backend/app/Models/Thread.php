<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'locked',
        'user_id',
        'free_game_id',
    ];

    /**
     * The user who created this thread.
     *
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The free game this thread is related to.
     *
     * @return BelongsTo<FreeGame>
     */
    public function freeGame(): BelongsTo
    {
        return $this->belongsTo(FreeGame::class);
    }

    /**
     * All posts within this thread.
     *
     * @return HasMany<Post>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
