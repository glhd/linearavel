<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerTierConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerTiersQueryResponse extends LinearResponse
{
	public function resolve(): CustomerTierConnection
	{
		return CustomerTierConnection::from($this->json('data.customerTiers'));
	}
}
