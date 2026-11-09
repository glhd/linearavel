<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CodeRepository */
class CodeRepository extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $owner,
		public Optional|string $name,
		public Optional|string $externalRepositoryId,
		public Optional|string $externalOwnerId,
		public Optional|string $visibility,
		public Optional|string $baseUrl,
		public Optional|string $defaultBranch,
		public Optional|string $fullPath,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
