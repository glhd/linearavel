<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AccessKeyRelease */
class AccessKeyRelease extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $name,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		public Optional|AccessKeyReleaseStage $stage,
		public Optional|string $url,
		public Optional|string|null $commitSha,
		public Optional|string|null $version,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
