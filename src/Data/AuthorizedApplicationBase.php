<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthorizedApplicationBase extends Data
{
	function __construct(
		public Optional|string $name,
		public Optional|string|null $imageUrl,
		/** @var Collection<int, string> */
		public Optional|Collection $scope,
		public Optional|string $appId,
		public Optional|string $clientId
	) {
	}
}
