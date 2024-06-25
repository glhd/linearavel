<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserUnsuspendResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserUnsuspendRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userUnsuspend', $args));
	}
	
	public function get(string ...$fields): UserAdminPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserUnsuspendResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserUnsuspendResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserUnsuspendResponse);
		
		return $response;
	}
}
