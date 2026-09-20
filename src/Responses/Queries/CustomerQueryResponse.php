<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Customer;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerQueryResponse extends LinearResponse
{
	public function resolve(): Customer
	{
		return Customer::from($this->json('data.customer'));
	}
}
