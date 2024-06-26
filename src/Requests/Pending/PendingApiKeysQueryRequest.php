<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ApiKeyConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApiKeysQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApiKeysQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.label', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'apiKeys', $args));
	}
	
	public function get(string ...$fields): ApiKeyConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApiKeysQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApiKeysQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApiKeysQueryResponse);
		
		return $response;
	}
}
