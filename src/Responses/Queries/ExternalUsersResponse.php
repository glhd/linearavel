<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ExternalUserConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ExternalUsersResponse extends LinearResponse
{
	public function resolve(): ExternalUserConnection
	{
		return ExternalUserConnection::from($this->json('data.externalUsers'));
	}
}
