<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationHasScopesPayload extends Data
{
	function __construct(
		public Optional|bool $hasAllScopes,
		/** @var Collection<int, string> */
		public Optional|Collection $missingScopes
	) {
	}
}
