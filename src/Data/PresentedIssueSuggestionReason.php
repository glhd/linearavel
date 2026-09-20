<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PresentedIssueSuggestionReason */
class PresentedIssueSuggestionReason extends Data
{
	public function __construct(
		public Optional|string $text,
		/** @var Collection<int, IssueSuggestionReasonReference> */
		public Optional|Collection $references
	) {
	}
}
