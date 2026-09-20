<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSkillFilter */
class AgentSkillFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?IDComparatorInput $ownerId = null,
		public ?BooleanComparatorInput $shared = null,
		public ?NullableTeamFilterInput $team = null,
		/** @var iterable<AgentSkillFilterInput>|Collection<int, AgentSkillFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<AgentSkillFilterInput>|Collection<int, AgentSkillFilterInput> */
		public ?iterable $or = null
	) {
	}
}
