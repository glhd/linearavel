<?php

namespace Glhd\Linearavel\Data\Queries;

use Carbon\CarbonInterface;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class User extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|string $description,
		public Optional|string $email,
		public Optional|string $timezone,
		public Optional|string $url,
		public Optional|bool $active,
		public Optional|bool $admin,
		public Optional|bool $guest,
		public Optional|bool $isMe,
		public Optional|string $avatarUrl,
		public Optional|string $statusLabel,
		public Optional|string $statusEmoji,
		public Optional|string $disableReason,
		public Optional|string $inviteHash,
		public Optional|int $createdIssueCount,
		public Optional|CarbonInterface $createdAt,
		public Optional|CarbonInterface $updatedAt,
		public Optional|CarbonInterface $lastSeen,
		public Optional|CarbonInterface $statusUntilAt,
		public Optional|CarbonInterface $archivedAt,
	) {
	}
}
