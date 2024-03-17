<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class GoogleUserAccountAuthInput
{
	function __construct(
		public string $code,
		public string $timezone,
		/** @var Collection<int, string> */
		public Collection $teamIdsToJoin,
		public ?string $redirectUri = null,
		public ?string $signupCode = null,
		public ?string $inviteLink = null
	) {
	}
}
