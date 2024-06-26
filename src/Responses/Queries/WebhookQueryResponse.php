<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Webhook;
use Glhd\Linearavel\Responses\LinearResponse;

class WebhookQueryResponse extends LinearResponse
{
	public function resolve(): Webhook
	{
		return Webhook::from($this->json('data.webhook'));
	}
}
