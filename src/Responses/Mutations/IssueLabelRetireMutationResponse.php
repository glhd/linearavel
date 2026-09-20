<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueLabelRetireMutationResponse extends LinearResponse
{
	public function resolve(): IssueLabelPayload
	{
		return IssueLabelPayload::from($this->json('data.issueLabelRetire'));
	}
}
