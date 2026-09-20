<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\SemanticSearchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class SemanticSearchQueryResponse extends LinearResponse
{
	public function resolve(): SemanticSearchPayload
	{
		return SemanticSearchPayload::from($this->json('data.semanticSearch'));
	}
}
