<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerNeedUpdatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerNeedUpdateMutationResponse extends LinearResponse
{
	public function resolve(): CustomerNeedUpdatePayload
	{
		return CustomerNeedUpdatePayload::from($this->json('data.customerNeedUpdate'));
	}
}
