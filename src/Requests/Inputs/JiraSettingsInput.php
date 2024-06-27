<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraSettingsInput */
class JiraSettingsInput
{
	public function __construct(
		/** @var iterable<JiraProjectDataInput>|Collection<int, JiraProjectDataInput> */
		public iterable $projects,
		/** @var iterable<JiraLinearMappingInput>|Collection<int, JiraLinearMappingInput> */
		public ?iterable $projectMapping = null,
		public ?bool $isJiraServer = null
	) {
	}
}
