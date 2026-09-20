<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeRelation;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeRelationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeRelationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'sortOrder', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeRelation', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeRelation
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeRelationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeRelationQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeRelationQueryResponse);
		
		return $response;
	}
}
