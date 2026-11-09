<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\JiraProjectBatchMigratePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class JiraProjectBatchMigrateMutationResponse extends LinearResponse
{
	public function resolve(): JiraProjectBatchMigratePayload
	{
		return JiraProjectBatchMigratePayload::from($this->json('data.jiraProjectBatchMigrate'));
	}
}
