<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PasskeyLoginFinishMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPasskeyLoginFinishMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'email', 'allowDomainAccess', 'lastUsedOrganizationId', 'service', 'token'];

	protected const ARGUMENT_TYPES = ['response' => 'JSONObject!', 'authId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'passkeyLoginFinish', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AuthResolverResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PasskeyLoginFinishMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PasskeyLoginFinishMutationResponse::class, $query))->throw();
		
		assert($response instanceof PasskeyLoginFinishMutationResponse);
		
		return $response;
	}
}
