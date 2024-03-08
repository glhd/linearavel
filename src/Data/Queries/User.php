<?php

namespace Glhd\Linearavel\Data\Queries;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class User extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|string|null $description,
		public Optional|string $email,
		public Optional|string $timezone,
		public Optional|string $url,
		public Optional|bool $active,
		public Optional|bool $admin,
		public Optional|bool $guest,
		public Optional|bool $isMe,
		public Optional|string $avatarUrl,
		public Optional|string|null $statusLabel,
		public Optional|string|null $statusEmoji,
		public Optional|string|null $disableReason,
		public Optional|string $inviteHash,
		public Optional|int $createdIssueCount,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $lastSeen,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $statusUntilAt,
		#[WithCast(DateTimeInterfaceCast::class, format: DATE_RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt,
	) {
	}
}
