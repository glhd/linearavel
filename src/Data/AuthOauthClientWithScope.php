<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOauthClientWithScope extends Data
{
	public function __construct(
		public Optional|string $name,
		/** @var Collection<int, string> */
		public Optional|Collection $scope,
		public Optional|string $appId,
		public Optional|string $clientId,
		public Optional|string|null $imageUrl = null,
		public Optional|string|null $webhookUrl = null
	) {
	}
}
