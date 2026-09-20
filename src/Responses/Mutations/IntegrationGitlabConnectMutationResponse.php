<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitLabIntegrationCreatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationGitlabConnectMutationResponse extends LinearResponse
{
	public function resolve(): GitLabIntegrationCreatePayload
	{
		return GitLabIntegrationCreatePayload::from($this->json('data.integrationGitlabConnect'));
	}
}
