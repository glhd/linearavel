<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\IssueSharedAccessDisallowedField;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSharedAccess */
class IssueSharedAccess extends Data
{
	public function __construct(
		public Optional|bool $isShared,
		public Optional|bool $viewerHasOnlySharedAccess,
		public Optional|int $sharedWithCount,
		/** @var Collection<int, User> */
		public Optional|Collection $sharedWithUsers,
		/** @var Collection<int, IssueSharedAccessDisallowedField> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $disallowedIssueFields
	) {
	}
}
