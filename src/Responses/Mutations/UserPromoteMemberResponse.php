<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class UserPromoteMemberResponse extends LinearResponse
{
	public function resolve(): UserAdminPayload
	{
		return UserAdminPayload::from($this->json('data.userPromoteMember'));
	}
}
