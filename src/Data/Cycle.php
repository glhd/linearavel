<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Cycle extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|float $number,
		#[LinearDate]
		public Optional|CarbonImmutable $startsAt,
		#[LinearDate]
		public Optional|CarbonImmutable $endsAt,
		/** @var Collection<int, float> */
		public Optional|Collection $issueCountHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $completedIssueCountHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $scopeHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $completedScopeHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $inProgressScopeHistory,
		public Optional|Team $team,
		public Optional|IssueConnection $issues,
		public Optional|IssueConnection $uncompletedIssuesUponClose,
		public Optional|float $progress,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $name,
		public Optional|string|null $description,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoArchivedAt
	) {
	}
}
