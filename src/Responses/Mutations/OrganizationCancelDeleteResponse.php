<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\OrganizationCancelDeletePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationCancelDeleteResponse extends LinearResponse
{
	public function resolve(): OrganizationCancelDeletePayload
	{
		return OrganizationCancelDeletePayload::from($this->json('data.organizationCancelDelete'));
	}
}
