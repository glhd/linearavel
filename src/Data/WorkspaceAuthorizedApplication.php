<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WorkspaceAuthorizedApplication */
class WorkspaceAuthorizedApplication extends Data
{
	public function __construct(
		public Optional|string $name,
		/** @var Collection<int, string> */
		public Optional|Collection $scope,
		public Optional|string $appId,
		public Optional|string $clientId,
		public Optional|bool $webhooksEnabled,
		public Optional|float $totalMembers,
		/** @var Collection<int, AuthMembership> */
		public Optional|Collection $memberships,
		public Optional|string|null $imageUrl
	) {
	}
}
