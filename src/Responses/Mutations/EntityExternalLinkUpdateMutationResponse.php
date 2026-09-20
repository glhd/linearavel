<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\EntityExternalLinkPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class EntityExternalLinkUpdateMutationResponse extends LinearResponse
{
	public function resolve(): EntityExternalLinkPayload
	{
		return EntityExternalLinkPayload::from($this->json('data.entityExternalLinkUpdate'));
	}
}
