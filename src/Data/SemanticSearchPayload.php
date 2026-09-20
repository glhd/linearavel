<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SemanticSearchPayload */
class SemanticSearchPayload extends Data
{
	public function __construct(
		public Optional|bool $enabled,
		/** @var Collection<int, SemanticSearchResult> */
		public Optional|Collection $results
	) {
	}
}
