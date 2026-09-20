<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueImportJqlCheckPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportJqlCheckQueryResponse extends LinearResponse
{
	public function resolve(): IssueImportJqlCheckPayload
	{
		return IssueImportJqlCheckPayload::from($this->json('data.issueImportJqlCheck'));
	}
}
