<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Application extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $clientId,
		public Optional|string $name,
		public Optional|string|null $description = null,
		public Optional|string $developer,
		public Optional|string $developerUrl,
		public Optional|string|null $imageUrl = null
	) {
	}
}
