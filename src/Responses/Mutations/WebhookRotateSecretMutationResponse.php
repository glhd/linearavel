<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\WebhookRotateSecretPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class WebhookRotateSecretMutationResponse extends LinearResponse
{
	public function resolve(): WebhookRotateSecretPayload
	{
		return WebhookRotateSecretPayload::from($this->json('data.webhookRotateSecret'));
	}
}
