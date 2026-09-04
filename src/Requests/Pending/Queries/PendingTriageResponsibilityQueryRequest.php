<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TriageResponsibility;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TriageResponsibilityQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTriageResponsibilityQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'action', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'triageResponsibility', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TriageResponsibility
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TriageResponsibilityQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilityQueryResponse::class, $query))->throw();
		
		assert($response instanceof TriageResponsibilityQueryResponse);
		
		return $response;
	}
}
