<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Data Transfer Object for Post.
 *
 * Represents the structure of a forum post entity.
 */
class PostDTO extends DataTransferObject
{
    /** @var string The content of the post */
    public string $body;

    /** @var ?string URL or path to an image */
    public ?string $image = null;

    /** @var int Number of likes, default to 0 */
    public int $likes = 0;

    /** @var int Number of dislikes, default to 0 */
    public int $dislikes = 0;

    /** @var int ID of the user who created the post */
    public int $user_id;

    /** @var int ID of the thread the post belongs to */
    public int $thread_id;

    /** @var ?int ID of the parent post */
    public ?int $parent_id = null;
}
