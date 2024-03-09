<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotionSettings extends Data
{
	function __construct(public Optional|string $workspaceId, public Optional|string $workspaceName)
	{
	}
}
