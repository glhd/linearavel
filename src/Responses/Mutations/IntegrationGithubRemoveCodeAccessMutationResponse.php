<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IntegrationGithubRemoveCodeAccessPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IntegrationGithubRemoveCodeAccessMutationResponse extends LinearResponse
{
	public function resolve(): IntegrationGithubRemoveCodeAccessPayload
	{
		return IntegrationGithubRemoveCodeAccessPayload::from($this->json('data.integrationGithubRemoveCodeAccess'));
	}
}
