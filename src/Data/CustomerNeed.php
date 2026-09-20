<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomerNeed */
class CustomerNeed extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|float $priority,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Customer|null $customer,
		public Optional|Issue|null $issue,
		public Optional|Project|null $project,
		public Optional|Comment|null $comment,
		public Optional|Attachment|null $attachment,
		public Optional|ProjectAttachment|null $projectAttachment,
		public Optional|string|null $body,
		public Optional|string|null $bodyData,
		public Optional|User|null $creator,
		public Optional|Issue|null $originalIssue,
		public Optional|string|null $url,
		public Optional|string|null $content
	) {
	}
}
