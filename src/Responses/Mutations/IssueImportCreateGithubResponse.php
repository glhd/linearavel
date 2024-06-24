<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportCreateGithubResponse extends LinearResponse
{
	public function resolve(): IssueImportPayload
	{
		return IssueImportPayload::from($this->json('data.issueImportCreateGithub'));
	}
}
