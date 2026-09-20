<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerStatusPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerStatusUpdateMutationResponse extends LinearResponse
{
	public function resolve(): CustomerStatusPayload
	{
		return CustomerStatusPayload::from($this->json('data.customerStatusUpdate'));
	}
}
