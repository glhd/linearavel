<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackAsksSettings extends Data
{
	public Optional|string|null $teamName = null
        
public Optional|string|null $teamId = null,
        
	function __construct(
		/** @var Collection<int, SlackChannelNameMapping> */
		public Optional|Collection $slackChannelMapping,
		public Optional|UserRoleType $canAdministrate,
	) {
	}
}
