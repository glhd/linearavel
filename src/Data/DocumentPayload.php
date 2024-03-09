<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Document;
class DocumentPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Document $document, public Optional|bool $success)
    {
    }
}
