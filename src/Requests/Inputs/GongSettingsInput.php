<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GongSettingsInput */
class GongSettingsInput
{
	public function __construct(public ?GongRecordingImportConfigInput $importConfig = null, public ?bool $tagParticipantsInIssues = null)
	{
	}
}
