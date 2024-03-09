<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueImportDeletePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|IssueImport|null $issueImport, public Optional|bool $success)
	{
	}
}
