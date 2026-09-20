<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestCommit */
class PullRequestCommit extends Data
{
	public function __construct(
		public Optional|string $sha,
		public Optional|string $message,
		public Optional|string $committedAt,
		public Optional|float $additions,
		public Optional|float $deletions,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $authorUserIds,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $authorExternalUserIds,
		public Optional|string|null $authoredAt,
		public Optional|float|null $changedFiles,
		public Optional|bool|null $isMergeCommit,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $parentShas,
		public Optional|PullRequestCommitSignature|null $signature,
		public Optional|string|null $committerUserId,
		public Optional|string|null $committerExternalUserId
	) {
	}
}
