<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\GithubOAuthTokenPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportFinishGithubOAuthResponse extends LinearResponse
{
	public function resolve(): GithubOAuthTokenPayload
	{
		return GithubOAuthTokenPayload::from($this->json('data.issueImportFinishGithubOAuth'));
	}
}
