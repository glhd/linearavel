<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectFilterSuggestionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectFilterSuggestionResponse extends LinearResponse
{
	public function resolve(): ProjectFilterSuggestionPayload
	{
		return ProjectFilterSuggestionPayload::from($this->json('data.projectFilterSuggestion'));
	}
}
