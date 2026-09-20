<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationStartTrialPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationStartTrialForPlanMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationStartTrialForPlanMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['input' => 'OrganizationStartTrialInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationStartTrialForPlan', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationStartTrialPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationStartTrialForPlanMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationStartTrialForPlanMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationStartTrialForPlanMutationResponse);
		
		return $response;
	}
}
