<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\WebhookFailureEvent;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class AuditLogWebhookFailureEventsQueryResponse extends LinearResponse
{
	/** @returns Collection<int, WebhookFailureEvent> */
	public function resolve(): Collection
	{
		return WebhookFailureEvent::collect($this->json('data.auditLogWebhookFailureEvents'), Collection::class);
	}
}
