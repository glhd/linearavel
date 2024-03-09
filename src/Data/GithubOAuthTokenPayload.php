<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GithubOAuthTokenPayload extends Data
{
	function __construct(
		public Optional|string|null $token,
		/** @var Collection<int, GithubOrg> */
		public Collection $organizations
	) {
	}
}
