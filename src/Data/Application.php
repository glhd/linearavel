<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Application */
class Application extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|string|null $description,
		public Optional|string|null $imageUrl
	) {
	}
}
