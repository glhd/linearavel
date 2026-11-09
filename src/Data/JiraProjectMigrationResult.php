<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraProjectMigrationResult */
class JiraProjectMigrationResult extends Data
{
	public function __construct(public Optional|int $index, public Optional|bool $success, public Optional|string|null $externalId, public Optional|string|null $key, public Optional|string|null $name, public Optional|JiraProjectMigrationError|null $error, public Optional|int|null $issueCount, public Optional|JiraProject|null $jiraProject, public Optional|IssueImport|null $issueImport)
	{
	}
}
