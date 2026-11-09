<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ImportUsersOption;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectMigrateImportInput */
class JiraProjectMigrateImportInput
{
	public function __construct(public bool $includeStaleIssues, public bool $includeClosedIssues, public ImportUsersOption $users, public ?string $jql = null)
	{
	}
}
