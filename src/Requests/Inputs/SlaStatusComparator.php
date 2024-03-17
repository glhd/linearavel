<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\SlaStatus;
use Illuminate\Support\Collection;

class SlaStatusComparator
{
	public function __construct(
		public ?SlaStatus $eq = null,
		public ?SlaStatus $neq = null,
		/** @var iterable<SlaStatus>|Collection<int, SlaStatus> */
		public ?iterable $in = null,
		/** @var iterable<SlaStatus>|Collection<int, SlaStatus> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
