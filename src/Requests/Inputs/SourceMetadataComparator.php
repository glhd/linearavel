<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class SourceMetadataComparator
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $in,
		/** @var Collection<int, string> */
		public Collection $nin,
		public ?string $eq = null,
		public ?string $neq = null,
		public ?bool $null = null,
		public ?SubTypeComparator $subType = null
	) {
	}
}
