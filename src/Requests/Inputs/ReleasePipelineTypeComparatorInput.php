<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ReleasePipelineType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleasePipelineTypeComparator */
class ReleasePipelineTypeComparatorInput
{
	public function __construct(
		public ?ReleasePipelineType $eq = null,
		public ?ReleasePipelineType $neq = null,
		/** @var iterable<ReleasePipelineType>|Collection<int, ReleasePipelineType> */
		public ?iterable $in = null,
		/** @var iterable<ReleasePipelineType>|Collection<int, ReleasePipelineType> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
