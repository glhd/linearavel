<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TriageResponsibilityPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TriageResponsibilityUpdateResponse extends LinearResponse
{
	public function resolve(): TriageResponsibilityPayload
	{
		return TriageResponsibilityPayload::from($this->json('data.triageResponsibilityUpdate'));
	}
}
