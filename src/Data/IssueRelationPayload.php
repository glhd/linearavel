<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelationPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|IssueRelation $issueRelation, public Optional|bool $success)
	{
	}
}
