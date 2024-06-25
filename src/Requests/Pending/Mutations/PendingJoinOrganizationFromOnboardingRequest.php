<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\JoinOrganizationFromOnboardingResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingJoinOrganizationFromOnboardingRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'joinOrganizationFromOnboarding', $args));
	}
	
	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): JoinOrganizationFromOnboardingResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(JoinOrganizationFromOnboardingResponse::class, (string) $query))->throw();
		
		assert($response instanceof JoinOrganizationFromOnboardingResponse);
		
		return $response;
	}
}
