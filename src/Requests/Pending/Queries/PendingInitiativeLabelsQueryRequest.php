<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeLabelConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeLabelsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeLabelsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.isGroup', 'nodes.archivedAt', 'nodes.description', 'nodes.lastAppliedAt', 'nodes.retiredAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'InitiativeLabelFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeLabels', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeLabelConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeLabelsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeLabelsQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeLabelsQueryResponse);
		
		return $response;
	}
}
