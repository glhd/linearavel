<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackAsksSettings extends Data
{
	function __construct(
		public Optional|string|null $teamName,
		public Optional|string|null $teamId,
		/** @var Collection<int, SlackChannelNameMapping> */
		public Collection $slackChannelMapping,
		public Optional|UserRoleType $canAdministrate
	) {
	}
}
