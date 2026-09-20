<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerTierPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerTierUpdateMutationResponse extends LinearResponse
{
	public function resolve(): CustomerTierPayload
	{
		return CustomerTierPayload::from($this->json('data.customerTierUpdate'));
	}
}
