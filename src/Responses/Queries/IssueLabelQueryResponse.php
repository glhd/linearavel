<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueLabel;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueLabelQueryResponse extends LinearResponse
{
	public function resolve(): IssueLabel
	{
		return IssueLabel::from($this->json('data.issueLabel'));
	}
}
