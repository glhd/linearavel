<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\AiPromptProgressStatus;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AiPromptProgressStatusComparator */
class AiPromptProgressStatusComparatorInput
{
	public function __construct(
		public ?AiPromptProgressStatus $eq = null,
		public ?AiPromptProgressStatus $neq = null,
		/** @var iterable<AiPromptProgressStatus>|Collection<int, AiPromptProgressStatus> */
		public ?iterable $in = null,
		/** @var iterable<AiPromptProgressStatus>|Collection<int, AiPromptProgressStatus> */
		public ?iterable $nin = null,
		public ?bool $null = null
	) {
	}
}
