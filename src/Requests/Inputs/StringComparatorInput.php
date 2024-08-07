<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/StringComparator */
class StringComparatorInput
{
	public function __construct(
		public ?string $eq = null,
		public ?string $neq = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $in = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $nin = null,
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
