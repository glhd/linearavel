<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerStatusConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerStatusesQueryResponse extends LinearResponse
{
	public function resolve(): CustomerStatusConnection
	{
		return CustomerStatusConnection::from($this->json('data.customerStatuses'));
	}
}
