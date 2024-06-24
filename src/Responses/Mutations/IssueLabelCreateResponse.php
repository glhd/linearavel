<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class IssueLabelCreateResponse extends LinearResponse
{
	public function resolve(): IssueLabelPayload
	{
		return IssueLabelPayload::from($this->json('data.issueLabelCreate'));
	}
}
