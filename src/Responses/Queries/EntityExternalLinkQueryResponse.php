<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\EntityExternalLink;
use Glhd\Linearavel\Responses\LinearResponse;

class EntityExternalLinkQueryResponse extends LinearResponse
{
	public function resolve(): EntityExternalLink
	{
		return EntityExternalLink::from($this->json('data.entityExternalLink'));
	}
}
