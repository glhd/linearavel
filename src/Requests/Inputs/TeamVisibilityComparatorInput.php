<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\TeamVisibility;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamVisibilityComparator */
class TeamVisibilityComparatorInput
{
	public function __construct(
		public ?TeamVisibility $eq = null,
		public ?TeamVisibility $neq = null,
		/** @var iterable<TeamVisibility>|Collection<int, TeamVisibility> */
		public ?iterable $in = null,
		/** @var iterable<TeamVisibility>|Collection<int, TeamVisibility> */
		public ?iterable $nin = null
	) {
	}
}
