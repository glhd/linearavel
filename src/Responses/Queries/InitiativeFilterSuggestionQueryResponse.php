<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeFilterSuggestionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeFilterSuggestionQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeFilterSuggestionPayload
	{
		return InitiativeFilterSuggestionPayload::from($this->json('data.initiativeFilterSuggestion'));
	}
}
