<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomViewCreateResponse extends LinearResponse
{
	public function resolve(): CustomViewPayload
	{
		return CustomViewPayload::from($this->json('data.customViewCreate'));
	}
}
