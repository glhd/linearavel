<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OAuthApplicationRotateWebhookSecretPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OauthApplicationRotateWebhookSecretMutationResponse extends LinearResponse
{
	public function resolve(): OAuthApplicationRotateWebhookSecretPayload
	{
		return OAuthApplicationRotateWebhookSecretPayload::from($this->json('data.oauthApplicationRotateWebhookSecret'));
	}
}
