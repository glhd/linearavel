<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitLabSettingsInput
{
	function __construct(public ?string $url = null, public ?bool $readonly = null, public ?string $expiresAt = null)
	{
	}
}
