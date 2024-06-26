<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UserPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class UserUpdateMutationResponse extends LinearResponse
{
	public function resolve(): UserPayload
	{
		return UserPayload::from($this->json('data.userUpdate'));
	}
}
