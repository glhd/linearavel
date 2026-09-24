<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DependencyPackageMetadataResult */
class DependencyPackageMetadataResult extends Data
{
	public function __construct(
		public Optional|string $name,
		public Optional|string $version,
		public Optional|string|null $license,
		#[LinearDate]
		public Optional|CarbonImmutable|null $publishedAt,
		public Optional|float|null $weeklyDownloads
	) {
	}
}
