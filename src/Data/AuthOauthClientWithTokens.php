<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOauthClientWithTokens extends Data
{
	function __construct(
		public Optional|AuthOauthClient $client,
		/** @var Collection<int, OauthToken> */
		public Optional|Collection $tokens
	) {
	}
}
