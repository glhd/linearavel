<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentActivityFilter */
class AgentActivityFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $agentSessionId = null,
		public ?StringComparatorInput $type = null,
		public ?NullableCommentFilterInput $sourceComment = null,
		/** @var iterable<AgentActivityFilterInput>|Collection<int, AgentActivityFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<AgentActivityFilterInput>|Collection<int, AgentActivityFilterInput> */
		public ?iterable $or = null
	) {
	}
}
