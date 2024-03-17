<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimelessDateComparator
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
