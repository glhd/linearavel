<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GoogleUserAccountAuthMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGoogleUserAccountAuthMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'email', 'allowDomainAccess', 'lastUsedOrganizationId', 'token'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'googleUserAccountAuth', $args));
	}
	
	public function get(string ...$fields): AuthResolverResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GoogleUserAccountAuthMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GoogleUserAccountAuthMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof GoogleUserAccountAuthMutationResponse);
		
		return $response;
	}
}
