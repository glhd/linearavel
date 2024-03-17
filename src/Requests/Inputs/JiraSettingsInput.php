<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class JiraSettingsInput
{
	public function __construct(
		/** @var iterable<JiraLinearMappingInput>|Collection<int, JiraLinearMappingInput> */
		public iterable $projectMapping,
		/** @var iterable<JiraProjectDataInput>|Collection<int, JiraProjectDataInput> */
		public iterable $projects,
		public ?bool $isJiraServer = null
	) {
	}
}
