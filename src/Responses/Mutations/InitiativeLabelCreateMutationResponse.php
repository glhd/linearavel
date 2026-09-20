<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeLabelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeLabelCreateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeLabelPayload
	{
		return InitiativeLabelPayload::from($this->json('data.initiativeLabelCreate'));
	}
}
