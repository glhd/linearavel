<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WebhooksQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhooksQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.enabled', 'nodes.allPublicTeams', 'nodes.resourceTypes', 'nodes.archivedAt', 'nodes.label', 'nodes.url', 'nodes.secret'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'webhooks', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): WebhookConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): WebhooksQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhooksQueryResponse::class, $query))->throw();
		
		assert($response instanceof WebhooksQueryResponse);
		
		return $response;
	}
}
