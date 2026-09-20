<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\CustomerVisibilityMode;
use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackAsksSettingsInput */
class SlackAsksSettingsInput
{
	public function __construct(
		public UserRoleType $canAdministrate,
		public ?string $teamName = null,
		public ?string $teamId = null,
		public ?string $enterpriseName = null,
		public ?string $enterpriseId = null,
		public ?bool $shouldUnfurl = null,
		public ?bool $shouldUseDefaultUnfurl = null,
		public ?bool $externalUserActions = null,
		/** @var iterable<SlackChannelNameMappingInput>|Collection<int, SlackChannelNameMappingInput> */
		public ?iterable $slackChannelMapping = null,
		public ?CustomerVisibilityMode $customerVisibility = null,
		public ?bool $enableAgent = null,
		public ?bool $enableLinearAgentWorkflowAccess = null
	) {
	}
}
