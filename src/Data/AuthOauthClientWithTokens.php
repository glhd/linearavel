<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AuthOauthClientWithTokens */
class AuthOauthClientWithTokens extends Data
{
	public function __construct(
		public Optional|AuthOauthClient $client,
		/** @var Collection<int, OauthToken> */
		public Optional|Collection $tokens
	) {
	}
}
