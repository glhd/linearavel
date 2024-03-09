<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueImportCheckPayload extends Data
{
	function __construct(public Optional|bool $success)
	{
	}
}