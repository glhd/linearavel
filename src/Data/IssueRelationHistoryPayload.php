<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelationHistoryPayload extends Data
{
	public function __construct(public Optional|string $identifier, public Optional|string $type)
	{
	}
}
