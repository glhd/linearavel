<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Responses\LinearResponse;

class UserQueryResponse extends LinearResponse
{
	public function resolve(): User
	{
		return User::from($this->json('data.user'));
	}
}
