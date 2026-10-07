<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationQuotaConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class QuotasQueryResponse extends LinearResponse
{
	public function resolve(): OrganizationQuotaConnection
	{
		return OrganizationQuotaConnection::from($this->json('data.quotas'));
	}
}
