<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationWithAuthorizationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApplicationWithAuthorizationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'clientId', 'name', 'developer', 'developerUrl', 'isAuthorized', 'createdByLinear', 'webhooksEnabled', 'description', 'imageUrl', 'approvalErrorCode'];

	protected const ARGUMENT_TYPES = ['actor' => 'String', 'redirectUri' => 'String', 'scope' => '[String!]!', 'clientId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationWithAuthorization', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserAuthorizedApplication
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ApplicationWithAuthorizationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApplicationWithAuthorizationQueryResponse::class, $query))->throw();
		
		assert($response instanceof ApplicationWithAuthorizationQueryResponse);
		
		return $response;
	}
}
