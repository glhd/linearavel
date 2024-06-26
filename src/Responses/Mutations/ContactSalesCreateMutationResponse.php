<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ContactSalesCreateMutationResponse extends LinearResponse
{
	public function resolve(): ContactPayload
	{
		return ContactPayload::from($this->json('data.contactSalesCreate'));
	}
}
