<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentSourcesPayload extends Data
{
	function __construct(public Optional|JSONObject $sources)
	{
	}
}
