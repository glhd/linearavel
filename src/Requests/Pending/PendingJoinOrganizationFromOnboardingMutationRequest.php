<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\JoinOrganizationFromOnboardingMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJoinOrganizationFromOnboardingMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'joinOrganizationFromOnboarding', $args));
	}
	
	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): JoinOrganizationFromOnboardingMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JoinOrganizationFromOnboardingMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof JoinOrganizationFromOnboardingMutationResponse);
		
		return $response;
	}
}
