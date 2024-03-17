<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class GoogleUserAccountAuthInput
{
	public function __construct(
		public string $code,
		public string $timezone,
		public ?string $redirectUri = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIdsToJoin = null,
		public ?string $signupCode = null,
		public ?string $inviteLink = null
	) {
	}
}
