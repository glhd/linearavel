<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\JSONObject;
class AttachmentSourcesPayload extends Data
{
    function __construct(public Optional|JSONObject $sources)
    {
    }
}
