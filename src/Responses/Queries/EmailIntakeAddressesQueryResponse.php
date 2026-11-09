<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\EmailIntakeAddressConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailIntakeAddressesQueryResponse extends LinearResponse
{
	public function resolve(): EmailIntakeAddressConnection
	{
		return EmailIntakeAddressConnection::from($this->json('data.emailIntakeAddresses'));
	}
}
