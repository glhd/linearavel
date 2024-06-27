<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraSettings */
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
