<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OAuthApplicationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationUpdateMutationResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationPayload
	{
		return OAuthApplicationPayload::from($this->json('data.oauthApplicationUpdate'));
	}
}
