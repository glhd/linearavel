<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

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
