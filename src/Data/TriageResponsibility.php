<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\TriageResponsibilityAction;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TriageResponsibility */
class TriageResponsibility extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|TriageResponsibilityAction $action,
		public Optional|Team $team,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|TriageResponsibilityManualSelection|null $manualSelection,
		public Optional|TimeSchedule|null $timeSchedule,
		public Optional|User|null $currentUser
	) {
	}
}
