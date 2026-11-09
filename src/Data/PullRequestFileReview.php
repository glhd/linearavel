<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestFileReview */
class PullRequestFileReview extends Data
{
	public function __construct(
		public Optional|string $path,
		public Optional|string $state,
		public Optional|string|null $reviewedAtSha,
		#[LinearDate]
		public Optional|CarbonImmutable|null $reviewedAt
	) {
	}
}
