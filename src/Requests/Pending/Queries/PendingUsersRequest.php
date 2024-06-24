<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UsersResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUsersRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'users', $args));
	}
	
	public function get(string ...$fields): UserConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UsersResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(UsersResponse::class, (string) $query))->throw();
		
		assert($response instanceof UsersResponse);
		
		return $response;
	}
}
