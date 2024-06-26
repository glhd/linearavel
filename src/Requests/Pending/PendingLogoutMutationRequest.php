<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\LogoutMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLogoutMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'logout', $args));
	}
	
	public function get(string ...$fields): LogoutResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): LogoutMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(LogoutMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof LogoutMutationResponse);
		
		return $response;
	}
}
