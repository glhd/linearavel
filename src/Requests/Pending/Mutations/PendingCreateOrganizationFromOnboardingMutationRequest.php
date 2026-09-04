<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CreateOrganizationFromOnboardingMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCreateOrganizationFromOnboardingMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = ['survey' => 'OnboardingCustomerSurvey', 'input' => 'CreateOrganizationInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'createOrganizationFromOnboarding', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CreateOrganizationFromOnboardingMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CreateOrganizationFromOnboardingMutationResponse::class, $query))->throw();
		
		assert($response instanceof CreateOrganizationFromOnboardingMutationResponse);
		
		return $response;
	}
}
