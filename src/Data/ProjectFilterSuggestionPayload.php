<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectFilterSuggestionPayload extends Data
{
	public function __construct(public Optional|string|null $filter)
	{
	}
}
