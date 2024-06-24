<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WebhooksResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhooksRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'webhooks', $args));
	}
	
	public function get(string ...$fields): WebhookConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WebhooksResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(WebhooksResponse::class, (string) $query))->throw();
		
		assert($response instanceof WebhooksResponse);
		
		return $response;
	}
}
