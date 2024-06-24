<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'teams', $args));
	}
	
	public function get(string ...$fields): TeamConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TeamsResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamsResponse);
		
		return $response;
	}
}
