<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InitiativeLeadTeamUpdatePayload */
class InitiativeLeadTeamUpdatePayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|Initiative $initiative,
		public Optional|bool $success,
		/** @var Collection<int, Initiative> */
		public Optional|Collection $affectedDescendants
	) {
	}
}
