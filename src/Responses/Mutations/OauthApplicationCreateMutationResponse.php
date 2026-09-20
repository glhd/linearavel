<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OAuthApplicationCreatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationCreateMutationResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationCreatePayload
	{
		return OAuthApplicationCreatePayload::from($this->json('data.oauthApplicationCreate'));
	}
}
