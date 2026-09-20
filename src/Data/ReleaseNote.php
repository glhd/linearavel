<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\ReleaseNoteGenerationStatus;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleaseNote */
class ReleaseNote extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|ReleasePipeline $pipeline,
		public Optional|string $slugId,
		public Optional|int $releaseCount,
		/** @var Collection<int, Release> */
		public Optional|Collection $releases,
		public Optional|string $url,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $title,
		public Optional|Release|null $firstRelease,
		public Optional|Release|null $lastRelease,
		public Optional|ReleaseNoteGenerationStatus|null $generationStatus,
		public Optional|DocumentContent|null $documentContent
	) {
	}
}
