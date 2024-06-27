<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ViewPreferencesUpdateInput */
class ViewPreferencesUpdateInput
{
	public function __construct(public ?string $preferences = null, public ?string $insights = null)
	{
	}
}
