<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueFilterSuggestionPayload extends Data
{
	function __construct(public Optional|string|null $filter = null)
	{
	}
}
