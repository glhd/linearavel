<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class SourceTypeComparator
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $in,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $nin,
		public ?string $eq = null,
		public ?string $neq = null,
		public ?string $eqIgnoreCase = null,
		public ?string $neqIgnoreCase = null,
		public ?string $startsWith = null,
		public ?string $startsWithIgnoreCase = null,
		public ?string $notStartsWith = null,
		public ?string $endsWith = null,
		public ?string $notEndsWith = null,
		public ?string $contains = null,
		public ?string $containsIgnoreCase = null,
		public ?string $notContains = null,
		public ?string $notContainsIgnoreCase = null
	) {
	}
}
