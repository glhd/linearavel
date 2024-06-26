<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueImportCheckPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportCheckCSVQueryResponse extends LinearResponse
{
	public function resolve(): IssueImportCheckPayload
	{
		return IssueImportCheckPayload::from($this->json('data.issueImportCheckCSV'));
	}
}
