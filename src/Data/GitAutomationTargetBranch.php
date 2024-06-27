<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/GitAutomationTargetBranch */
class GitAutomationTargetBranch extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|Team $team,
		public Optional|string $branchPattern,
		public Optional|bool $isRegex,
		public Optional|GitAutomationStateConnection $automationStates,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
