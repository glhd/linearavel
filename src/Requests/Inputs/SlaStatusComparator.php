<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\SlaStatus;
use Illuminate\Support\Collection;

class SlaStatusComparator
{
	public function __construct(
		/** @var Collection<int, SlaStatus> */
		public Collection $in,
		/** @var Collection<int, SlaStatus> */
		public Collection $nin,
		public ?SlaStatus $eq = null,
		public ?SlaStatus $neq = null,
		public ?bool $null = null
	) {
	}
}
