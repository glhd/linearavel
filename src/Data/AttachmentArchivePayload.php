<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Attachment, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class AttachmentArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Attachment|null $entity)
    {
    }
}
