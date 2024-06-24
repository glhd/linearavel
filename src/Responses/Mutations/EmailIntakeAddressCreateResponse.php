<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EmailIntakeAddressPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailIntakeAddressCreateResponse extends LinearResponse
{
	public function resolve(): EmailIntakeAddressPayload
	{
		return EmailIntakeAddressPayload::from($this->json('data.emailIntakeAddressCreate'));
	}
}
