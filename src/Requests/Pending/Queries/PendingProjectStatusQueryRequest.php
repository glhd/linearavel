<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectStatus;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectStatusQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectStatusQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'position', 'type', 'indefinite', 'archivedAt', 'description', 'teamId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectStatus', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectStatus
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectStatusQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectStatusQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectStatusQueryResponse);
		
		return $response;
	}
}
