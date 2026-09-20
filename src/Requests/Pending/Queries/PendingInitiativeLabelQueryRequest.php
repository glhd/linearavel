<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeLabel;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeLabelQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeLabelQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'isGroup', 'archivedAt', 'description', 'lastAppliedAt', 'retiredAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeLabel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeLabel
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeLabelQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeLabelQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeLabelQueryResponse);
		
		return $response;
	}
}
