<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLabel;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectLabelQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLabelQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'isGroup', 'archivedAt', 'description', 'lastAppliedAt', 'retiredAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectLabel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectLabel
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectLabelQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLabelQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectLabelQueryResponse);
		
		return $response;
	}
}
