<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Cycle extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|float $number,
		public Optional|string|null $name = null,
		public Optional|string|null $description = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $startsAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $endsAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $completedAt = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $autoArchivedAt = null,
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
		public Optional|float $progress
	) {
	}
}
