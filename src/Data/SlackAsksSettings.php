<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackAsksSettings extends Data
{
	public function __construct(
		public Optional|string|null $teamName = null,
		public Optional|string|null $teamId = null,
		/** @var Collection<int, SlackChannelNameMapping> */
		public Optional|Collection $slackChannelMapping,
		public Optional|UserRoleType $canAdministrate
	) {
	}
}
