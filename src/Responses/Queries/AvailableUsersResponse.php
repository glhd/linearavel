<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class AvailableUsersResponse extends LinearResponse
{
	public function resolve(): AuthResolverResponse
	{
		return AuthResolverResponse::from($this->json('data.availableUsers'));
	}
}
