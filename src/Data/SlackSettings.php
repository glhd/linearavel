<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackSettings extends Data
{
	public function __construct(public Optional|string|null $teamName = null, public Optional|string|null $teamId = null, public Optional|bool $linkOnIssueIdMention)
	{
	}
}
