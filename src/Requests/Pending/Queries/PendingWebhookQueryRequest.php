<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Webhook;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WebhookQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'enabled', 'allPublicTeams', 'resourceTypes', 'archivedAt', 'label', 'url', 'secret'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'webhook', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Webhook
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): WebhookQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookQueryResponse::class, $query))->throw();
		
		assert($response instanceof WebhookQueryResponse);
		
		return $response;
	}
}
