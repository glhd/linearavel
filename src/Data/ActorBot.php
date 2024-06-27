<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ActorBot */
class ActorBot extends Data
{
	public function __construct(
		public Optional|string $type,
		public Optional|string|null $id,
		public Optional|string|null $subType,
		public Optional|string|null $name,
		public Optional|string|null $userDisplayName,
		public Optional|string|null $avatarUrl
	) {
	}
}
