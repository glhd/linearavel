<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\UserConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class UsersResponse extends LinearResponse
{
	public function resolve(): UserConnection
	{
		return UserConnection::from($this->json('data.users'));
	}
}
