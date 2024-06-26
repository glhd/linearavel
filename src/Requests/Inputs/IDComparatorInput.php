<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class IDComparatorInput
{
	public function __construct(
		public ?string $eq = null,
		public ?string $neq = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $in = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $nin = null
	) {
	}
}
