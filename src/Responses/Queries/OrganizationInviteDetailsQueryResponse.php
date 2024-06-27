<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Contracts\SkipsCodeGeneration;
use Glhd\Linearavel\Data\OrganizationInviteFullDetailsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInviteDetailsQueryResponse extends LinearResponse implements SkipsCodeGeneration
{
	public function resolve(): OrganizationInviteFullDetailsPayload
	{
		return OrganizationInviteFullDetailsPayload::from($this->json('data.organizationInviteDetails'));
	}
}
