<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AuthenticationSessionResponse;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class UserSessionsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, AuthenticationSessionResponse> */
	public function resolve(): Collection
	{
		return AuthenticationSessionResponse::collect($this->json('data.userSessions'), Collection::class);
	}
}
