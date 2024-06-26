<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Responses\LinearResponse;

class CreateOrganizationFromOnboardingMutationResponse extends LinearResponse
{
	public function resolve(): CreateOrJoinOrganizationResponse
	{
		return CreateOrJoinOrganizationResponse::from($this->json('data.createOrganizationFromOnboarding'));
	}
}
