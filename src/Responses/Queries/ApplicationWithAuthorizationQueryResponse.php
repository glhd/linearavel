<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\UserAuthorizedApplication;
use Glhd\Linearavel\Responses\LinearResponse;

class ApplicationWithAuthorizationQueryResponse extends LinearResponse
{
	public function resolve(): UserAuthorizedApplication
	{
		return UserAuthorizedApplication::from($this->json('data.applicationWithAuthorization'));
	}
}
