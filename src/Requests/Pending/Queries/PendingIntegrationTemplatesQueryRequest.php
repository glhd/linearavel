<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationTemplateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationTemplatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationTemplatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.archivedAt', 'nodes.foreignEntityId'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationTemplates', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationTemplateConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationTemplatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationTemplatesQueryResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationTemplatesQueryResponse);
		
		return $response;
	}
}
