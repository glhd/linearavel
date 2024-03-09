<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthorizedApplication extends Data
{
	function __construct(
		public Optional|string $name,
		public Optional|string|null $imageUrl,
		/** @var Collection<int, string> */
		public Collection $scope,
		public Optional|string $appId,
		public Optional|string $clientId,
		public Optional|bool $webhooksEnabled
	) {
	}
}
