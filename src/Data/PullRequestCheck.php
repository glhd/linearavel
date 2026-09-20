<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Enums\PullRequestCheckPresentation;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestCheck */
class PullRequestCheck extends Data
{
	public function __construct(
		public Optional|string $name,
		public Optional|string $status,
		public Optional|string|null $workflowName,
		public Optional|string|null $url,
		public Optional|bool|null $isRequired,
		public Optional|PullRequestCheckPresentation|null $presentation,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt
	) {
	}
}
