<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TokenUserAccountAuthInput
{
	public function __construct(
		public string $email,
		public string $token,
		public string $timezone,
		/** @var Collection<int, string> */
		public Collection $teamIdsToJoin,
		public ?string $inviteLink = null
	) {
	}
}
