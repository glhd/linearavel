<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TokenUserAccountAuthInput */
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
