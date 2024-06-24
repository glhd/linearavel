<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AdministrableTeamsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAdministrableTeamsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'administrableTeams', $args));
	}
	
	public function get(string ...$fields): TeamConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AdministrableTeamsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(AdministrableTeamsResponse::class, (string) $query))->throw();
		
		assert($response instanceof AdministrableTeamsResponse);
		
		return $response;
	}
}
