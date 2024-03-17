<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class WorkflowStateFilter
{
	public function __construct(
		public ?IDComparator $id = null,
		public ?DateComparator $createdAt = null,
		public ?DateComparator $updatedAt = null,
		public ?StringComparator $name = null,
		public ?StringComparator $description = null,
		public ?NumberComparator $position = null,
		public ?StringComparator $type = null,
		public ?TeamFilter $team = null,
		public ?IssueCollectionFilter $issues = null,
		/** @var iterable<WorkflowStateFilter>|Collection<int, WorkflowStateFilter> */
		public ?iterable $and = null,
		/** @var iterable<WorkflowStateFilter>|Collection<int, WorkflowStateFilter> */
		public ?iterable $or = null
	) {
	}
}
