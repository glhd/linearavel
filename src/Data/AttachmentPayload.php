<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Attachment;
class AttachmentPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Attachment $attachment, public Optional|bool $success)
    {
    }
}
