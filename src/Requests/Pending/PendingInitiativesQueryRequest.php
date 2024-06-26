<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.slugId',
		'nodes.sortOrder',
		'nodes.archivedAt',
		'nodes.description',
		'nodes.color',
		'nodes.targetDate',
		'nodes.targetDateResolution',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiatives', $args));
	}
	
	public function get(string ...$fields): InitiativeConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativesQueryResponse);
		
		return $response;
	}
}
