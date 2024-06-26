<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueImportDeletePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportDeleteMutationResponse extends LinearResponse
{
	public function resolve(): IssueImportDeletePayload
	{
		return IssueImportDeletePayload::from($this->json('data.issueImportDelete'));
	}
}
