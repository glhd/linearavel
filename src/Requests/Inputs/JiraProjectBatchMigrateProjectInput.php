<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectBatchMigrateProjectInput */
class JiraProjectBatchMigrateProjectInput
{
	public function __construct(public ?string $externalId = null, public ?string $key = null, public ?string $teamId = null, public ?string $teamName = null, public ?JiraProjectMigrateImportInput $import = null, public ?JiraProjectMigrateSyncInput $sync = null)
	{
	}
}
