<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserDiscordConnectMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserDiscordConnectMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['redirectUri' => 'String!', 'code' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userDiscordConnect', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserDiscordConnectMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserDiscordConnectMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserDiscordConnectMutationResponse);
		
		return $response;
	}
}
