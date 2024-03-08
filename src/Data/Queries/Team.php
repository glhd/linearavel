<?php

namespace Glhd\Linearavel\Data\Queries;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Team extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $key,
		public Optional|string $name,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|bool $private,
		public Optional|float $cycleCooldownTime,
		public Optional|float $cycleDuration,
		public Optional|float $cycleStartDay,
		public Optional|string $cycleCalenderUrl,
		public Optional|bool $cycleIssueAutoAssignCompleted,
		public Optional|bool $cycleIssueAutoAssignStarted,
		public Optional|bool $cycleLockToActive,
		public Optional|bool $cyclesEnabled,
		public Optional|string $issueEstimationType,
		public Optional|bool $issueOrderingNoPriorityFirst,
		public Optional|bool $issueEstimationAllowZero,
		public Optional|bool $issueEstimationExtended,
		public Optional|string|null $autoCloseStateId,
		public Optional|string|null $inviteHash,
		public Optional|string|bool|null $joinByDefault,
		public Optional|float $autoArchivePeriod,
		public Optional|float|null $autoClosePeriod,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt,
	) {
	}
}
