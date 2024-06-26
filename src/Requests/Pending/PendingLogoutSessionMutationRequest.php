<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\LogoutSessionMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLogoutSessionMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'logoutSession', $args));
	}
	
	public function get(string ...$fields): LogoutResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): LogoutSessionMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(LogoutSessionMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof LogoutSessionMutationResponse);
		
		return $response;
	}
}
