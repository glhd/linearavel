<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NullableStringComparator
{
	public function __construct(
		/** @var Collection<int, string> */
		public Collection $in,
		/** @var Collection<int, string> */
		public Collection $nin,
		public ?string $eq = null,
		public ?string $neq = null,
		public ?bool $null = null,
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
