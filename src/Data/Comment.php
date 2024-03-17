<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Comment extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $body,
		public Optional|string $bodyData,
		public Optional|string $reactionData,
		public Optional|string $url,
		public Optional|CommentConnection $children,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|Issue|null $issue = null,
		public Optional|DocumentContent|null $documentContent = null,
		public Optional|ProjectUpdate|null $projectUpdate = null,
		public Optional|Comment|null $parent = null,
		public Optional|User|null $resolvingUser = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $resolvedAt = null,
		public Optional|Comment|null $resolvingComment = null,
		public Optional|User|null $user = null,
		public Optional|ExternalUser|null $externalUser = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $editedAt = null,
		public Optional|string|null $quotedText = null,
		public Optional|string|null $summaryText = null,
		public Optional|ActorBot|null $botActor = null
	) {
	}
}
