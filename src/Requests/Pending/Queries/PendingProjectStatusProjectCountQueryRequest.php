<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectStatusCountPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectStatusProjectCountQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectStatusProjectCountQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['count', 'privateCount', 'archivedTeamCount'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectStatusProjectCount', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectStatusCountPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectStatusProjectCountQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectStatusProjectCountQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectStatusProjectCountQueryResponse);
		
		return $response;
	}
}
