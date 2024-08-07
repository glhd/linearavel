<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\GitHubCommitIntegrationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationGithubCommitCreateMutationResponse extends LinearResponse
{
	public function resolve(): GitHubCommitIntegrationPayload
	{
		return GitHubCommitIntegrationPayload::from($this->json('data.integrationGithubCommitCreate'));
	}
}
