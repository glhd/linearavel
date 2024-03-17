<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ActorBot extends Data
{
	public function __construct(
		public Optional|string|null $id = null,
		public Optional|string $type,
		public Optional|string|null $subType = null,
		public Optional|string|null $name = null,
		public Optional|string|null $userDisplayName = null,
		public Optional|string|null $avatarUrl = null
	) {
	}
}
