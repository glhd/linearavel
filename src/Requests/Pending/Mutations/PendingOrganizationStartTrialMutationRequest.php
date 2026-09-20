<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationStartTrialPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationStartTrialMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationStartTrialMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationStartTrial', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationStartTrialPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationStartTrialMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationStartTrialMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationStartTrialMutationResponse);
		
		return $response;
	}
}
