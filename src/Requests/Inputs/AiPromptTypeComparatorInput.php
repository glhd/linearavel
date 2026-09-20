<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\AiPromptType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AiPromptTypeComparator */
class AiPromptTypeComparatorInput
{
	public function __construct(
		public ?AiPromptType $eq = null,
		public ?AiPromptType $neq = null,
		/** @var iterable<AiPromptType>|Collection<int, AiPromptType> */
		public ?iterable $in = null,
		/** @var iterable<AiPromptType>|Collection<int, AiPromptType> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
