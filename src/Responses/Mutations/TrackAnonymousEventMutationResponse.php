<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EventTrackingPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TrackAnonymousEventMutationResponse extends LinearResponse
{
	public function resolve(): EventTrackingPayload
	{
		return EventTrackingPayload::from($this->json('data.trackAnonymousEvent'));
	}
}
