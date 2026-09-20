<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\TriageRuleErrorType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueHistoryTriageRuleError */
class IssueHistoryTriageRuleError extends Data
{
	public function __construct(
		public Optional|TriageRuleErrorType $type,
		public Optional|string|null $property,
		public Optional|bool|null $conflictForSameChildLabel,
		public Optional|Team|null $fromTeam,
		public Optional|Team|null $toTeam,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection|null $conflictingLabels
	) {
	}
}
