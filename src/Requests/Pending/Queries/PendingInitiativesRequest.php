<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiatives', $args));
	}
	
	public function get(string ...$fields): InitiativeConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(InitiativesResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativesResponse);
		
		return $response;
	}
}
