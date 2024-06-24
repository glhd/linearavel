<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'user', $args));
	}
	
	public function get(string ...$fields): User
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(UserResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserResponse);
		
		return $response;
	}
}
