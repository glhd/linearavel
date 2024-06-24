<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\DocumentSearchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class SearchDocumentsResponse extends LinearResponse
{
	public function resolve(): DocumentSearchPayload
	{
		return DocumentSearchPayload::from($this->json('data.searchDocuments'));
	}
}
