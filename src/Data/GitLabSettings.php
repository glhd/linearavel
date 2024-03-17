<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitLabSettings extends Data
{
	function __construct(public Optional|string|null $url = null, public Optional|bool|null $readonly = null, public Optional|string|null $expiresAt = null)
	{
	}
}
