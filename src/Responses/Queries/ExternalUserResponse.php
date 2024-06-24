<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ExternalUser;
use Glhd\Linearavel\Responses\LinearResponse;

class ExternalUserResponse extends LinearResponse
{
	public function resolve(): ExternalUser
	{
		return ExternalUser::from($this->json('data.externalUser'));
	}
}
