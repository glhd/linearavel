<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitLabTestConnectionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationGitlabTestConnectionMutationResponse extends LinearResponse
{
	public function resolve(): GitLabTestConnectionPayload
	{
		return GitLabTestConnectionPayload::from($this->json('data.integrationGitlabTestConnection'));
	}
}
