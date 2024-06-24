<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\IssueFilterSuggestionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueFilterSuggestionResponse extends LinearResponse
{
	public function resolve(): IssueFilterSuggestionPayload
	{
		return IssueFilterSuggestionPayload::from($this->json('data.issueFilterSuggestion'));
	}
}
