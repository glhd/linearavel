<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerUnsyncMutationResponse extends LinearResponse
{
	public function resolve(): CustomerPayload
	{
		return CustomerPayload::from($this->json('data.customerUnsync'));
	}
}
