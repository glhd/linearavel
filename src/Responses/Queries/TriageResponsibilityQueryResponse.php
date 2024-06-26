<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TriageResponsibility;
use Glhd\Linearavel\Responses\LinearResponse;

class TriageResponsibilityQueryResponse extends LinearResponse
{
	public function resolve(): TriageResponsibility
	{
		return TriageResponsibility::from($this->json('data.triageResponsibility'));
	}
}
