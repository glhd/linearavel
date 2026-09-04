<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\JoinOrganizationFromOnboardingMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJoinOrganizationFromOnboardingMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = ['input' => 'JoinOrganizationInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'joinOrganizationFromOnboarding', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): JoinOrganizationFromOnboardingMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JoinOrganizationFromOnboardingMutationResponse::class, $query))->throw();
		
		assert($response instanceof JoinOrganizationFromOnboardingMutationResponse);
		
		return $response;
	}
}
