<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueArchiveMutationResponse extends LinearResponse
{
	public function resolve(): IssueArchivePayload
	{
		return IssueArchivePayload::from($this->json('data.issueArchive'));
	}
}
