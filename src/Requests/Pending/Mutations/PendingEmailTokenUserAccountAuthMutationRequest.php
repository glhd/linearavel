<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailTokenUserAccountAuthMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailTokenUserAccountAuthMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'email', 'allowDomainAccess', 'lastUsedOrganizationId', 'token'];

	protected const ARGUMENT_TYPES = ['input' => 'TokenUserAccountAuthInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailTokenUserAccountAuth', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AuthResolverResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): EmailTokenUserAccountAuthMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailTokenUserAccountAuthMutationResponse::class, $query))->throw();
		
		assert($response instanceof EmailTokenUserAccountAuthMutationResponse);
		
		return $response;
	}
}
