<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ReleasePipelineType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleasePipeline */
class ReleasePipeline extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $slugId,
		public Optional|ReleasePipelineType $type,
		public Optional|bool $isProduction,
		public Optional|bool $autoGenerateReleaseNotesOnCompletion,
		public Optional|bool $rolloverIssuesOnCompletion,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $includePathPatterns,
		public Optional|int $approximateReleaseCount,
		public Optional|string $url,
		public Optional|TeamConnection $teams,
		public Optional|ReleaseStageConnection $stages,
		public Optional|ReleaseConnection $releases,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|bool|null $trashed,
		public Optional|Template|null $releaseNoteTemplate,
		public Optional|ReleaseNote|null $latestReleaseNote
	) {
	}
}
