<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EmailUnsubscribePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class EmailUnsubscribeMutationResponse extends LinearResponse
{
	public function resolve(): EmailUnsubscribePayload
	{
		return EmailUnsubscribePayload::from($this->json('data.emailUnsubscribe'));
	}
}
