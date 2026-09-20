<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\EmailIntakeAddressType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/EmailIntakeAddress */
class EmailIntakeAddress extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $address,
		public Optional|EmailIntakeAddressType $type,
		public Optional|bool $enabled,
		public Optional|bool $repliesEnabled,
		public Optional|bool $useUserNamesInReplies,
		public Optional|Organization $organization,
		public Optional|bool $customerRequestsEnabled,
		public Optional|bool $issueCreatedAutoReplyEnabled,
		public Optional|bool $issueCompletedAutoReplyEnabled,
		public Optional|bool $issueCanceledAutoReplyEnabled,
		public Optional|bool $reopenOnReply,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $forwardingEmailAddress,
		public Optional|string|null $senderName,
		public Optional|Template|null $template,
		public Optional|Team|null $team,
		public Optional|SesDomainIdentity|null $sesDomainIdentity,
		public Optional|User|null $creator,
		public Optional|string|null $issueCreatedAutoReply,
		public Optional|string|null $issueCompletedAutoReply,
		public Optional|string|null $issueCanceledAutoReply,
		#[LinearDate]
		public Optional|CarbonImmutable|null $lastUsedAt
	) {
	}
}
