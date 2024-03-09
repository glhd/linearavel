<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectFilterSuggestionPayload extends Data
{
	function __construct(public Optional|JSONObject|null $filter)
	{
	}
}
