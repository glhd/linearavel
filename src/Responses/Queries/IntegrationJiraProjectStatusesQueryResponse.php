<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\JiraProjectStatusesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationJiraProjectStatusesQueryResponse extends LinearResponse
{
	public function resolve(): JiraProjectStatusesPayload
	{
		return JiraProjectStatusesPayload::from($this->json('data.integrationJiraProjectStatuses'));
	}
}
