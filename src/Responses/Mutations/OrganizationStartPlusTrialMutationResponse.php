<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationStartPlusTrialPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationStartPlusTrialMutationResponse extends LinearResponse
{
	public function resolve(): OrganizationStartPlusTrialPayload
	{
		return OrganizationStartPlusTrialPayload::from($this->json('data.organizationStartPlusTrial'));
	}
}
