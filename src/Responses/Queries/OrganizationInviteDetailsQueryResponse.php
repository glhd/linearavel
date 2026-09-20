<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Contracts\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Data\OrganizationAcceptedOrExpiredInviteDetailsPayload;
use Glhd\Linearavel\Data\OrganizationInviteFullDetailsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInviteDetailsQueryResponse extends LinearResponse
{
	public function resolve(): OrganizationInviteDetailsPayload
	{
		return $this->resolveUnion($this->json('data.organizationInviteDetails'), ['OrganizationInviteFullDetailsPayload' => OrganizationInviteFullDetailsPayload::class, 'OrganizationAcceptedOrExpiredInviteDetailsPayload' => OrganizationAcceptedOrExpiredInviteDetailsPayload::class]);
	}
}
