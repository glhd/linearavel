<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationStartTrialPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationStartTrialForPlanMutationResponse extends LinearResponse
{
	public function resolve(): OrganizationStartTrialPayload
	{
		return OrganizationStartTrialPayload::from($this->json('data.organizationStartTrialForPlan'));
	}
}
