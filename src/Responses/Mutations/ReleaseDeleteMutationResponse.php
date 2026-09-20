<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseDeleteMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseArchivePayload
	{
		return ReleaseArchivePayload::from($this->json('data.releaseDelete'));
	}
}
