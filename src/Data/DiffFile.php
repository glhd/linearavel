<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\DiffFileState;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DiffFile */
class DiffFile extends Data
{
	public function __construct(public Optional|string $path, public Optional|DiffFileState $state, public Optional|int $additions, public Optional|int $deletions, public Optional|string|null $oldPath, public Optional|bool|null $omitted)
	{
	}
}
