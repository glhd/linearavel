<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackAsksSettingsInput */
class SlackAsksSettingsInput
{
	public function __construct(
		public UserRoleType $canAdministrate,
		public ?string $teamName = null,
		public ?string $teamId = null,
		/** @var iterable<SlackChannelNameMappingInput>|Collection<int, SlackChannelNameMappingInput> */
		public ?iterable $slackChannelMapping = null
	) {
	}
}
