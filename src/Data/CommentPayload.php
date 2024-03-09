<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Comment;
class CommentPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Comment $comment, public Optional|bool $success)
    {
    }
}
