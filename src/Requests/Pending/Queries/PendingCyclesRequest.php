<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CycleConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CyclesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCyclesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'cycles', $args));
	}
	
	public function get(string ...$fields): CycleConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CyclesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(CyclesResponse::class, (string) $query))->throw();
		
		assert($response instanceof CyclesResponse);
		
		return $response;
	}
}
