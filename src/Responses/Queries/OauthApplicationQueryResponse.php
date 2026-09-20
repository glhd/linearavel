<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OAuthApplication;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationQueryResponse extends LinearResponse
{
	public function resolve(): OAuthApplication
	{
		return OAuthApplication::from($this->json('data.oauthApplication'));
	}
}
