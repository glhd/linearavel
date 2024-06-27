<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitLabSettingsInput */
class GitLabSettingsInput
{
	public function __construct(public ?string $url = null, public ?bool $readonly = null, public ?string $expiresAt = null)
	{
	}
}
