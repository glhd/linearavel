<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EmailIntakeAddressRefreshSesDomainStatusPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailIntakeAddressRefreshSesDomainStatusMutationResponse extends LinearResponse
{
	public function resolve(): EmailIntakeAddressRefreshSesDomainStatusPayload
	{
		return EmailIntakeAddressRefreshSesDomainStatusPayload::from($this->json('data.emailIntakeAddressRefreshSesDomainStatus'));
	}
}
