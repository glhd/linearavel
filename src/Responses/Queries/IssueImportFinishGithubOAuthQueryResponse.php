<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\GithubOAuthTokenPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportFinishGithubOAuthQueryResponse extends LinearResponse
{
	public function resolve(): GithubOAuthTokenPayload
	{
		return GithubOAuthTokenPayload::from($this->json('data.issueImportFinishGithubOAuth'));
	}
}
