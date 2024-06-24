<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Cycle;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CycleResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'cycle', $args));
	}
	
	public function get(string ...$fields): Cycle
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(CycleResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleResponse);
		
		return $response;
	}
}
