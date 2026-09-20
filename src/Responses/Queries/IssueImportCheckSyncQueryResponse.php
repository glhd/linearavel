<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueImportSyncCheckPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueImportCheckSyncQueryResponse extends LinearResponse
{
	public function resolve(): IssueImportSyncCheckPayload
	{
		return IssueImportSyncCheckPayload::from($this->json('data.issueImportCheckSync'));
	}
}
