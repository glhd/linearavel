<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentSessionWorkspaceDiffFile */
class AgentSessionWorkspaceDiffFile extends Data
{
	public function __construct(public Optional|string $path, public Optional|string $state, public Optional|int $additions, public Optional|int $deletions, public Optional|string|null $oldPath)
	{
	}
}
