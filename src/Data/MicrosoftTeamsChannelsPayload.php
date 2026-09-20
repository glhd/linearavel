<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/MicrosoftTeamsChannelsPayload */
class MicrosoftTeamsChannelsPayload extends Data
{
	public function __construct(
		/** @var Collection<int, MicrosoftTeamsTeam> */
		public Optional|Collection $teams,
		public Optional|bool $success
	) {
	}
}
