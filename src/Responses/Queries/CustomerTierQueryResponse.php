<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerTier;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerTierQueryResponse extends LinearResponse
{
	public function resolve(): CustomerTier
	{
		return CustomerTier::from($this->json('data.customerTier'));
	}
}
