<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationCodingAgentSettingsInput */
class OrganizationCodingAgentSettingsInput
{
	public function __construct(public ?string $model = null, public ?string $effort = null, public ?bool $commitSigningEnabled = null, public ?string $sandboxSize = null, public ?bool $regionPinning = null)
	{
	}
}
