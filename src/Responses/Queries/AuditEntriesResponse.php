<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AuditEntryConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class AuditEntriesResponse extends LinearResponse
{
	public function resolve(): AuditEntryConnection
	{
		return AuditEntryConnection::from($this->json('data.auditEntries'));
	}
}
