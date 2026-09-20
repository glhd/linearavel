<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RepositorySuggestionsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueRepositorySuggestionsQueryResponse extends LinearResponse
{
	public function resolve(): RepositorySuggestionsPayload
	{
		return RepositorySuggestionsPayload::from($this->json('data.issueRepositorySuggestions'));
	}
}
