<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TokenUserAccountAuthInput
{
	public function __construct(
		public string $email,
		public string $token,
		public string $timezone,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIdsToJoin = null,
		public ?string $inviteLink = null
	) {
	}
}
