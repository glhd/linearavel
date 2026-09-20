<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentActivityPushCommit */
class AgentActivityPushCommit extends Data
{
	public function __construct(public Optional|string $sha, public Optional|int $additions, public Optional|int $deletions, public Optional|int $changedFiles)
	{
	}
}
