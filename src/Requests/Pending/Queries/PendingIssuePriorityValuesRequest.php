<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePriorityValue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssuePriorityValuesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingIssuePriorityValuesRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['priority', 'label'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issuePriorityValues', $args));
	}
	
	/** @returns Collection<int, IssuePriorityValue> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssuePriorityValuesResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssuePriorityValuesResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssuePriorityValuesResponse);
		
		return $response;
	}
}
