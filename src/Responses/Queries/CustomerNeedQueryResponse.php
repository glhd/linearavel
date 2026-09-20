<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomerNeed;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerNeedQueryResponse extends LinearResponse
{
	public function resolve(): CustomerNeed
	{
		return CustomerNeed::from($this->json('data.customerNeed'));
	}
}
