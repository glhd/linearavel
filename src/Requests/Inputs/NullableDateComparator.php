<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Illuminate\Support\Collection;

class NullableDateComparator
{
	public function __construct(
		public ?DateTimeInterface $eq = null,
		public ?DateTimeInterface $neq = null,
		/** @var iterable<DateTimeInterface>|Collection<int, DateTimeInterface> */
		public ?iterable $in = null,
		/** @var iterable<DateTimeInterface>|Collection<int, DateTimeInterface> */
		public ?iterable $nin = null,
		public ?bool $null = null,
		public ?DateTimeInterface $lt = null,
		public ?DateTimeInterface $lte = null,
		public ?DateTimeInterface $gt = null,
		public ?DateTimeInterface $gte = null
	) {
	}
}
