<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/RepositorySuggestionsPayload */
class RepositorySuggestionsPayload extends Data
{
	public function __construct(
		/** @var Collection<int, RepositorySuggestion> */
		public Optional|Collection $suggestions
	) {
	}
}
