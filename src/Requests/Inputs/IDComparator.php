<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IDComparator
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $in,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $nin,
		public ?string $eq = null,
		public ?string $neq = null
	) {
	}
}
