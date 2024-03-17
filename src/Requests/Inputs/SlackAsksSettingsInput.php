<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;

class SlackAsksSettingsInput
{
	public function __construct(
		/** @var Collection<int, SlackChannelNameMappingInput> */
		public Collection $slackChannelMapping,
		public UserRoleType $canAdministrate,
		public ?string $teamName = null,
		public ?string $teamId = null
	) {
	}
}
