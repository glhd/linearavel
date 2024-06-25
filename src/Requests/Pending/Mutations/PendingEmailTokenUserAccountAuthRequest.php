<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\EmailTokenUserAccountAuthResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingEmailTokenUserAccountAuthRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'email', 'allowDomainAccess', 'lastUsedOrganizationId', 'token'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'emailTokenUserAccountAuth', $args));
	}
	
	public function get(string ...$fields): AuthResolverResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): EmailTokenUserAccountAuthResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(EmailTokenUserAccountAuthResponse::class, (string) $query))->throw();
		
		assert($response instanceof EmailTokenUserAccountAuthResponse);
		
		return $response;
	}
}
