<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthToken extends Data
{
	public function __construct(
		public Optional|float $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		public Optional|AuthOauthClient $client,
		public Optional|string $clientId,
		public Optional|AuthUser $user,
		public Optional|string $userId,
		#[LinearDate] public Optional|CarbonImmutable|null $revokedAt
	) {
	}
}
