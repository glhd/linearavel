<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SlackSettingsInput
{
	public function __construct(public bool $linkOnIssueIdMention, public ?string $teamName = null, public ?string $teamId = null)
	{
	}
}
