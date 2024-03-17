<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GithubOAuthTokenPayload extends Data
{
	public Optional|string|null $token = null
        
	function __construct(
		/** @var Collection<int, GithubOrg> */
		public Optional|Collection $organizations,
	) {
	}
}
