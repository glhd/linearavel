<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SlackSettingsInput */
class SlackSettingsInput
{
	public function __construct(public bool $linkOnIssueIdMention, public ?string $teamName = null, public ?string $teamId = null)
	{
	}
}
