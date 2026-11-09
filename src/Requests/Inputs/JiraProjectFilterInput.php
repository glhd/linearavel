<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectFilter */
class JiraProjectFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?IDComparatorInput $integrationId = null,
		public ?StringComparatorInput $key = null,
		public ?NullableTeamFilterInput $team = null,
		/** @var iterable<JiraProjectFilterInput>|Collection<int, JiraProjectFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<JiraProjectFilterInput>|Collection<int, JiraProjectFilterInput> */
		public ?iterable $or = null
	) {
	}
}
