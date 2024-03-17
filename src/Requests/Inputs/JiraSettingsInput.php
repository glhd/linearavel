<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class JiraSettingsInput
{
	public function __construct(
		/** @var Collection<int, JiraLinearMappingInput> */
		public Collection $projectMapping,
		/** @var Collection<int, JiraProjectDataInput> */
		public Collection $projects,
		public ?bool $isJiraServer = null
	) {
	}
}
