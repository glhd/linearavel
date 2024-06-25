<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserUpdateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userUpdate', $args));
	}
	
	public function get(string ...$fields): UserPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserUpdateResponse);
		
		return $response;
	}
}
