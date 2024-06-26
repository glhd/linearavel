<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.service', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrations', $args));
	}
	
	public function get(string ...$fields): IntegrationConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationsQueryResponse);
		
		return $response;
	}
}
