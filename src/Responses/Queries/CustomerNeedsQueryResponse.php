<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerNeedConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerNeedsQueryResponse extends LinearResponse
{
	public function resolve(): CustomerNeedConnection
	{
		return CustomerNeedConnection::from($this->json('data.customerNeeds'));
	}
}
