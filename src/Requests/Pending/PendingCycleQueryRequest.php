<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Cycle;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CycleQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'number',
		'startsAt',
		'endsAt',
		'issueCountHistory',
		'completedIssueCountHistory',
		'scopeHistory',
		'completedScopeHistory',
		'inProgressScopeHistory',
		'progress',
		'archivedAt',
		'name',
		'description',
		'completedAt',
		'autoArchivedAt',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'cycle', $args));
	}
	
	public function get(string ...$fields): Cycle
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleQueryResponse);
		
		return $response;
	}
}
