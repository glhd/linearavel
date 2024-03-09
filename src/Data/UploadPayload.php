<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\UploadFile;
class UploadPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|UploadFile|null $uploadFile, public Optional|bool $success)
    {
    }
}
