<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDomainPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationDomainVerifyMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDomainVerifyMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'OrganizationDomainVerificationInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationDomainVerify', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationDomainPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationDomainVerifyMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationDomainVerifyMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationDomainVerifyMutationResponse);
		
		return $response;
	}
}
