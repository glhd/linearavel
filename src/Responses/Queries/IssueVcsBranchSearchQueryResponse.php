<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueVcsBranchSearchQueryResponse extends LinearResponse
{
	public function resolve(): ?Issue
	{
		$data = $this->json('data.issueVcsBranchSearch');
		
		return null === $data ? null : Issue::from($data);
	}
}
