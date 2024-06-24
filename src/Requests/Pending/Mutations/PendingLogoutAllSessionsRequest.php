<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\LogoutAllSessionsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLogoutAllSessionsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'logoutAllSessions', $args));
	}
	
	public function get(string ...$fields): LogoutResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): LogoutAllSessionsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(LogoutAllSessionsResponse::class, (string) $query))->throw();
		
		assert($response instanceof LogoutAllSessionsResponse);
		
		return $response;
	}
}
