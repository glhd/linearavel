<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SlackSettings extends Data
{
	public function __construct(public Optional|bool $linkOnIssueIdMention, public Optional|string|null $teamName, public Optional|string|null $teamId)
	{
	}
}
