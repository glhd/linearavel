<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\Contracts\ArchivePayload;

class IssueArchivePayload extends Data implements ArchivePayload
{
	function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Issue|null $entity = null)
	{
	}
}
