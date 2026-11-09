<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraProjectBatchMigratePayload */
class JiraProjectBatchMigratePayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|bool $success,
		/** @var Collection<int, JiraProjectMigrationResult> */
		public Optional|Collection $projects
	) {
	}
}
