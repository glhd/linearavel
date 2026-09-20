<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitHubEnterpriseServerPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationGitHubEnterpriseServerConnectMutationResponse extends LinearResponse
{
	public function resolve(): GitHubEnterpriseServerPayload
	{
		return GitHubEnterpriseServerPayload::from($this->json('data.integrationGitHubEnterpriseServerConnect'));
	}
}
