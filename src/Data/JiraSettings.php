<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class JiraSettings extends Data
{
	public function __construct(
		/** @var Collection<int, JiraProjectData> */
		public Optional|Collection $projects,
		/** @var Collection<int, JiraLinearMapping> */
		public Optional|Collection|null $projectMapping,
		public Optional|bool|null $isJiraServer
	) {
	}
}
