<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewSuggestionPayload extends Data
{
	public function __construct(public Optional|string|null $name = null, public Optional|string|null $description = null, public Optional|string|null $icon = null)
	{
	}
}
