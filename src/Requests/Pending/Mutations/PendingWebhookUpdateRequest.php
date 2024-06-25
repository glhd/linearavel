<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WebhookUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookUpdateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'webhookUpdate', $args));
	}
	
	public function get(string ...$fields): WebhookPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WebhookUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof WebhookUpdateResponse);
		
		return $response;
	}
}
