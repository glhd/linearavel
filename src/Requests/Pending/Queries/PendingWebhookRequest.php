<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Webhook;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WebhookResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'enabled', 'allPublicTeams', 'resourceTypes', 'archivedAt', 'label', 'url', 'secret'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'webhook', $args));
	}
	
	public function get(string ...$fields): Webhook
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WebhookResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookResponse::class, (string) $query))->throw();
		
		assert($response instanceof WebhookResponse);
		
		return $response;
	}
}
