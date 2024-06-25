<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ApiKeyConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApiKeysResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApiKeysRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.label', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'apiKeys', $args));
	}
	
	public function get(string ...$fields): ApiKeyConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApiKeysResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApiKeysResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApiKeysResponse);
		
		return $response;
	}
}
