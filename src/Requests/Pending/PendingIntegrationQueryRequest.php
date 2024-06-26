<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Integration;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'service', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integration', $args));
	}
	
	public function get(string ...$fields): Integration
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationQueryResponse);
		
		return $response;
	}
}
