<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackSettingsInput */
class SlackSettingsInput
{
	public function __construct(public bool $linkOnIssueIdMention, public ?string $teamName = null, public ?string $teamId = null, public ?string $enterpriseName = null, public ?string $enterpriseId = null, public ?bool $shouldUnfurl = null, public ?bool $shouldUseDefaultUnfurl = null, public ?bool $externalUserActions = null, public ?bool $enableAgent = null, public ?bool $enableLoops = null, public ?bool $allowAgentInPrivateChannels = null, public ?bool $syncAgentThreadsInPrivateChannels = null, public ?bool $enableLinearAgentWorkflowAccess = null, public ?bool $enableCodeIntelligence = null)
	{
	}
}
