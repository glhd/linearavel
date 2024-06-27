<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SlackSettings */
class SlackSettings extends Data
{
	public function __construct(public Optional|bool $linkOnIssueIdMention, public Optional|string|null $teamName, public Optional|string|null $teamId)
	{
	}
}
