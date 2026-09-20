<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AiPromptProgressFilter */
class AiPromptProgressFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?AiPromptTypeComparatorInput $type = null,
		public ?AiPromptProgressStatusComparatorInput $status = null,
		/** @var iterable<AiPromptProgressFilterInput>|Collection<int, AiPromptProgressFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<AiPromptProgressFilterInput>|Collection<int, AiPromptProgressFilterInput> */
		public ?iterable $or = null
	) {
	}
}
