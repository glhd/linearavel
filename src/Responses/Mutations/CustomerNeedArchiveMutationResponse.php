<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\CustomerNeedArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomerNeedArchiveMutationResponse extends LinearResponse
{
	public function resolve(): CustomerNeedArchivePayload
	{
		return CustomerNeedArchivePayload::from($this->json('data.customerNeedArchive'));
	}
}
