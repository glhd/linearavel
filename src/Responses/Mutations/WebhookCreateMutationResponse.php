<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class WebhookCreateMutationResponse extends LinearResponse
{
	public function resolve(): WebhookPayload
	{
		return WebhookPayload::from($this->json('data.webhookCreate'));
	}
}
