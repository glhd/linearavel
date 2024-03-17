<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class User extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
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
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $avatarUrl,
		public Optional|string|null $disableReason,
		public Optional|string|null $calendarHash,
		public Optional|string|null $description,
		public Optional|string|null $statusEmoji,
		public Optional|string|null $statusLabel,
		#[LinearDate] public Optional|CarbonImmutable|null $statusUntilAt,
		public Optional|string|null $timezone,
		#[LinearDate] public Optional|CarbonImmutable|null $lastSeen
	) {
	}
}
