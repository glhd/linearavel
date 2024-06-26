<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AuditEntryType;
use Glhd\Linearavel\Responses\LinearResponse;
use Illuminate\Support\Collection;

class AuditEntryTypesQueryResponse extends LinearResponse
{
	/** @returns Collection<int, AuditEntryType> */
	public function resolve(): Collection
	{
		return AuditEntryType::collect($this->json('data.auditEntryTypes'), Collection::class);
	}
}
