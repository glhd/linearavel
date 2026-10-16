<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OriginSettingsInput */
class OriginSettingsInput
{
	public function __construct(public ?string $ownerSlug = null)
	{
	}
}
