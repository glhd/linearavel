<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\OAuthClientApprovalStatus;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/OauthClientApproval */
class OauthClientApproval extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $oauthClientId,
		public Optional|string $requesterId,
		public Optional|OAuthClientApprovalStatus $status,
		/** @var Collection<int, string> */
		public Optional|Collection $scopes,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $responderId,
		public Optional|string|null $requestReason,
		public Optional|string|null $denyReason
	) {
	}
}
