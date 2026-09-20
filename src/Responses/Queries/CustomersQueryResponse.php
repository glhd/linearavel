<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomersQueryResponse extends LinearResponse
{
	public function resolve(): CustomerConnection
	{
		return CustomerConnection::from($this->json('data.customers'));
	}
}
