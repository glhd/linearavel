<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TriageResponsibilityConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class TriageResponsibilitiesResponse extends LinearResponse
{
	public function resolve(): TriageResponsibilityConnection
	{
		return TriageResponsibilityConnection::from($this->json('data.triageResponsibilities'));
	}
}
