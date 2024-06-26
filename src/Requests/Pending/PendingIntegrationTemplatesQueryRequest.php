<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationTemplateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationTemplatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationTemplatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.archivedAt', 'nodes.foreignEntityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationTemplates', $args));
	}
	
	public function get(string ...$fields): IntegrationTemplateConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationTemplatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationTemplatesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationTemplatesQueryResponse);
		
		return $response;
	}
}
