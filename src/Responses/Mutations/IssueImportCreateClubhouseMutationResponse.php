<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportCreateClubhouseMutationResponse extends LinearResponse
{
	public function resolve(): IssueImportPayload
	{
		return IssueImportPayload::from($this->json('data.issueImportCreateClubhouse'));
	}
}
