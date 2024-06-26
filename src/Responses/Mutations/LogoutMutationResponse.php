<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class LogoutMutationResponse extends LinearResponse
{
	public function resolve(): LogoutResponse
	{
		return LogoutResponse::from($this->json('data.logout'));
	}
}
