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
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Issue|null $issue,
		public Optional|DocumentContent|null $documentContent,
		public Optional|ProjectUpdate|null $projectUpdate,
		public Optional|Comment|null $parent,
		public Optional|User|null $resolvingUser,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $resolvedAt,
		public Optional|Comment|null $resolvingComment,
		public Optional|User|null $user,
		public Optional|ExternalUser|null $externalUser,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $editedAt,
		public Optional|string|null $quotedText,
		public Optional|string|null $summaryText,
		public Optional|ActorBot|null $botActor
	) {
	}
}
