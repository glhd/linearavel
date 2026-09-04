<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePriorityValue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssuePriorityValuesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingIssuePriorityValuesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['priority', 'label'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issuePriorityValues', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, IssuePriorityValue> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssuePriorityValuesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssuePriorityValuesQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssuePriorityValuesQueryResponse);
		
		return $response;
	}
}
