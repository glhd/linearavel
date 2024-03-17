<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class User extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|string $email,
		public Optional|string $inviteHash,
		public Optional|Organization $organization,
		public Optional|bool $guest,
		public Optional|bool $active,
		public Optional|string $url,
		public Optional|IssueConnection $assignedIssues,
		public Optional|IssueConnection $createdIssues,
		public Optional|int $createdIssueCount,
		public Optional|TeamConnection $teams,
		public Optional|TeamMembershipConnection $teamMemberships,
		public Optional|bool $isMe,
		public Optional|bool $admin,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string|null $avatarUrl = null,
		public Optional|string|null $disableReason = null,
		public Optional|string|null $calendarHash = null,
		public Optional|string|null $description = null,
		public Optional|string|null $statusEmoji = null,
		public Optional|string|null $statusLabel = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $statusUntilAt = null,
		public Optional|string|null $timezone = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $lastSeen = null
	) {
	}
}
