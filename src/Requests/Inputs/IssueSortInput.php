<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueSortInput */
class IssueSortInput
{
	public function __construct(
		public ?PrioritySortInput $priority = null,
		public ?EstimateSortInput $estimate = null,
		public ?TitleSortInput $title = null,
		public ?LabelSortInput $label = null,
		public ?SlaStatusSortInput $slaStatus = null,
		public ?CreatedAtSortInput $createdAt = null,
		public ?UpdatedAtSortInput $updatedAt = null,
		public ?CompletedAtSortInput $completedAt = null,
		public ?DueDateSortInput $dueDate = null,
		public ?CycleSortInput $cycle = null,
		public ?MilestoneSortInput $milestone = null,
		public ?AssigneeSortInput $assignee = null,
		public ?ProjectSortInput $project = null,
		public ?TeamSortInput $team = null,
		public ?ManualSortInput $manual = null,
		public ?WorkflowStateSortInput $workflowState = null
	) {
	}
}
