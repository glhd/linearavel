<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class JiraSettings extends Data
{
	function __construct(
		/** @var Collection<int, JiraLinearMapping> */
		public Optional|Collection $projectMapping,
		/** @var Collection<int, JiraProjectData> */
		public Optional|Collection $projects,
		public Optional|bool|null $isJiraServer = null
	) {
	}
}
