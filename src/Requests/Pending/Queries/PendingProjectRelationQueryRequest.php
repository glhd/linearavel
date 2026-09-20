<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectRelation;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectRelationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectRelationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'anchorType', 'relatedAnchorType', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectRelation', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectRelation
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectRelationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectRelationQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectRelationQueryResponse);
		
		return $response;
	}
}
