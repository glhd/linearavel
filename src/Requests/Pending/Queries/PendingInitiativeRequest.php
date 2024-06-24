<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Initiative;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiative', $args));
	}
	
	public function get(string ...$fields): Initiative
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativeResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(InitiativeResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativeResponse);
		
		return $response;
	}
}
