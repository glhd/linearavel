<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Document;
class DocumentEdge extends Data
{
    function __construct(public Optional|Document $node, public Optional|string $cursor)
    {
    }
}
