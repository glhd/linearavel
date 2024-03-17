<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\SlaStatus;
use Illuminate\Support\Collection;

class SlaStatusComparator
{
	public function __construct(
		/** @var iterable<SlaStatus>|Collection<int, SlaStatus> */
		public iterable $in,
		/** @var iterable<SlaStatus>|Collection<int, SlaStatus> */
		public iterable $nin,
		public ?SlaStatus $eq = null,
		public ?SlaStatus $neq = null,
		public ?bool $null = null
	) {
	}
}
