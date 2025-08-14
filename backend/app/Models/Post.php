<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'body',
        'image',
        'likes',
        'dislikes',
        'user_id',
        'thread_id',
        'parent_id',
    ];

    /**
     * The user who created this post.
     *
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The thread this post belongs to.
     *
     * @return BelongsTo<Thread>
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * The parent post.
     *
     * @return BelongsTo<Post>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }

    /**
     * The replies to this post.
     *
     * @return HasMany<Post>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Post::class, 'parent_id');
    }
}
