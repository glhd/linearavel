<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationTemplateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationTemplatesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationTemplatesRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.archivedAt', 'nodes.foreignEntityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationTemplates', $args));
	}
	
	public function get(string ...$fields): IntegrationTemplateConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationTemplatesResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationTemplatesResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationTemplatesResponse);
		
		return $response;
	}
}
