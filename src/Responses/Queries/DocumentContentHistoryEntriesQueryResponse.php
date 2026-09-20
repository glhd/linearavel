<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentContentHistoryEntriesQueryResponse extends LinearResponse
{
	public function resolve(): DocumentContentHistoryPayload
	{
		return DocumentContentHistoryPayload::from($this->json('data.documentContentHistoryEntries'));
	}
}
