<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ReleaseStageType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseStageTypeComparator */
class ReleaseStageTypeComparatorInput
{
	public function __construct(
		public ?ReleaseStageType $eq = null,
		public ?ReleaseStageType $neq = null,
		/** @var iterable<ReleaseStageType>|Collection<int, ReleaseStageType> */
		public ?iterable $in = null,
		/** @var iterable<ReleaseStageType>|Collection<int, ReleaseStageType> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
