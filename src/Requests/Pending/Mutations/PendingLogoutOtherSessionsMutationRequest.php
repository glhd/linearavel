<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\LogoutOtherSessionsMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLogoutOtherSessionsMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'logoutOtherSessions', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): LogoutResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): LogoutOtherSessionsMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(LogoutOtherSessionsMutationResponse::class, $query))->throw();
		
		assert($response instanceof LogoutOtherSessionsMutationResponse);
		
		return $response;
	}
}
