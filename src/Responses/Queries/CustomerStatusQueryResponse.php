<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerStatus;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerStatusQueryResponse extends LinearResponse
{
	public function resolve(): CustomerStatus
	{
		return CustomerStatus::from($this->json('data.customerStatus'));
	}
}
