<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WebhookCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookCreateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'webhookCreate', $args));
	}
	
	public function get(string ...$fields): WebhookPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WebhookCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof WebhookCreateResponse);
		
		return $response;
	}
}
