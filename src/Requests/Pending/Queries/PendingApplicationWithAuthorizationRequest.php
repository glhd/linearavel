<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationWithAuthorizationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApplicationWithAuthorizationRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationWithAuthorization', $args));
	}
	
	public function get(string ...$fields): UserAuthorizedApplication
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApplicationWithAuthorizationResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ApplicationWithAuthorizationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApplicationWithAuthorizationResponse);
		
		return $response;
	}
}
