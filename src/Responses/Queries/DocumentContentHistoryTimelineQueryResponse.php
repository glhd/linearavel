<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\DocumentContentHistoryTimelinePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class DocumentContentHistoryTimelineQueryResponse extends LinearResponse
{
	public function resolve(): DocumentContentHistoryTimelinePayload
	{
		return DocumentContentHistoryTimelinePayload::from($this->json('data.documentContentHistoryTimeline'));
	}
}
