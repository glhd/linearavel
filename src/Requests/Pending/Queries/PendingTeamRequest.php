<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'team', $args));
	}
	
	public function get(string ...$fields): Team
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TeamResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamResponse);
		
		return $response;
	}
}
