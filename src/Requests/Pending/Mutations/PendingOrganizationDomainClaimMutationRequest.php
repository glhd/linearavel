<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDomainSimplePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationDomainClaimMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDomainClaimMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationDomainClaim', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationDomainSimplePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationDomainClaimMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationDomainClaimMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationDomainClaimMutationResponse);
		
		return $response;
	}
}
