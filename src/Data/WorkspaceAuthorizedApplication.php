<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkspaceAuthorizedApplication extends Data
{
	function __construct(
		public Optional|string $name,
		public Optional|string|null $imageUrl,
		/** @var Collection<int, string> */
		public Collection $scope,
		public Optional|string $appId,
		public Optional|string $clientId,
		public Optional|bool $webhooksEnabled,
		public Optional|float $totalMembers,
		/** @var Collection<int, AuthMembership> */
		public Collection $memberships
	) {
	}
}
