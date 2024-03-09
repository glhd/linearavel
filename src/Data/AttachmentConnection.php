<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\AttachmentEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Attachment, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class AttachmentConnection extends Data
{
    function __construct(
        /** @var Collection<int, AttachmentEdge> */
        public Collection $edges,
        /** @var Collection<int, Attachment> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
