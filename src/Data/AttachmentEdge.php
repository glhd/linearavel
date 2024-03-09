<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Attachment;
class AttachmentEdge extends Data
{
    function __construct(public Optional|Attachment $node, public Optional|string $cursor)
    {
    }
}
