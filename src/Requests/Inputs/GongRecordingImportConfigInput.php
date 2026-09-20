<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GongRecordingImportConfigInput */
class GongRecordingImportConfigInput
{
	public function __construct(public ?string $teamId = null)
	{
	}
}
