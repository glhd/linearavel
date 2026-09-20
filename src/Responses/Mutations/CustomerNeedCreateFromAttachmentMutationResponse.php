<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerNeedPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerNeedCreateFromAttachmentMutationResponse extends LinearResponse
{
	public function resolve(): CustomerNeedPayload
	{
		return CustomerNeedPayload::from($this->json('data.customerNeedCreateFromAttachment'));
	}
}
