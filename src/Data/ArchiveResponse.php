<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ArchiveResponse */
class ArchiveResponse extends Data
{
	public function __construct(
		public Optional|string $archive,
		public Optional|float $totalCount,
		public Optional|float $databaseVersion,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $includesDependencies
	) {
	}
}
