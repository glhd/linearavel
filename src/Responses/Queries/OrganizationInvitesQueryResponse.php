<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationInviteConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationInvitesQueryResponse extends LinearResponse
{
	public function resolve(): OrganizationInviteConnection
	{
		return OrganizationInviteConnection::from($this->json('data.organizationInvites'));
	}
}
