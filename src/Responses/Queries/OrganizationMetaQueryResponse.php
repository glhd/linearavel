<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\OrganizationMeta;
use Glhd\Linearavel\Responses\LinearResponse;

class OrganizationMetaQueryResponse extends LinearResponse
{
	public function resolve(): ?OrganizationMeta
	{
		$data = $this->json('data.organizationMeta');
		
		return null === $data ? null : OrganizationMeta::from($data);
	}
}
