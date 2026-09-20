<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSuggestionMetadata */
class IssueSuggestionMetadata extends Data
{
	public function __construct(
		public Optional|float|null $score,
		public Optional|string|null $classification,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $reasons,
		public Optional|string|null $evalLogId,
		public Optional|float|null $rank,
		public Optional|string|null $variant,
		public Optional|string|null $appliedAutomationRuleId,
		public Optional|string|null $failedAutomationRuleId,
		public Optional|string|null $failedAutomationRuleReason
	) {
	}
}
