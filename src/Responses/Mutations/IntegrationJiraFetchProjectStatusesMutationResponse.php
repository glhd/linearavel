<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\JiraFetchProjectStatusesPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationJiraFetchProjectStatusesMutationResponse extends LinearResponse
{
	public function resolve(): JiraFetchProjectStatusesPayload
	{
		return JiraFetchProjectStatusesPayload::from($this->json('data.integrationJiraFetchProjectStatuses'));
	}
}
