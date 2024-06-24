<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class WebhookUpdateResponse extends LinearResponse
{
	public function resolve(): WebhookPayload
	{
		return WebhookPayload::from($this->json('data.webhookUpdate'));
	}
}
