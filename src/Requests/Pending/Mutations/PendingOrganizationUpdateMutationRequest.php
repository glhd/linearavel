<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'OrganizationUpdateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationUpdateMutationResponse);
		
		return $response;
	}
}
