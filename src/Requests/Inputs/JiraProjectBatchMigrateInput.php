<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectBatchMigrateInput */
class JiraProjectBatchMigrateInput
{
	public function __construct(
		public string $integrationId,
		/** @var iterable<JiraProjectBatchMigrateProjectInput>|Collection<int, JiraProjectBatchMigrateProjectInput> */
		public iterable $projects
	) {
	}
}
