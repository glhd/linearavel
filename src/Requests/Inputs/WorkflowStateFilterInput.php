<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class WorkflowStateFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $name = null,
		public ?StringComparatorInput $description = null,
		public ?NumberComparatorInput $position = null,
		public ?StringComparatorInput $type = null,
		public ?TeamFilterInput $team = null,
		public ?IssueCollectionFilterInput $issues = null,
		/** @var iterable<WorkflowStateFilterInput>|Collection<int, WorkflowStateFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<WorkflowStateFilterInput>|Collection<int, WorkflowStateFilterInput> */
		public ?iterable $or = null
	) {
	}
}
