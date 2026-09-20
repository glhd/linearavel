<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\EmailIntakeAddress;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailIntakeAddressQueryResponse extends LinearResponse
{
	public function resolve(): EmailIntakeAddress
	{
		return EmailIntakeAddress::from($this->json('data.emailIntakeAddress'));
	}
}
