<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TimelessDateComparator */
class TimelessDateComparatorInput
{
	public function __construct(
		public ?string $eq = null,
		public ?string $neq = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $in = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $nin = null,
		public ?string $lt = null,
		public ?string $lte = null,
		public ?string $gt = null,
		public ?string $gte = null
	) {
	}
}
