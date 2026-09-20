<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OAuthApplicationRotateSecretPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationRotateSecretMutationResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationRotateSecretPayload
	{
		return OAuthApplicationRotateSecretPayload::from($this->json('data.oauthApplicationRotateSecret'));
	}
}
