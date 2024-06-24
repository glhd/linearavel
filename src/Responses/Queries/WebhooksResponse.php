<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\WebhookConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class WebhooksResponse extends LinearResponse
{
	public function resolve(): WebhookConnection
	{
		return WebhookConnection::from($this->json('data.webhooks'));
	}
}
