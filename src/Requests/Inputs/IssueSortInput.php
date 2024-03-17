<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueSortInput
{
	function __construct(
		public ?PrioritySort $priority = null,
		public ?EstimateSort $estimate = null,
		public ?TitleSort $title = null,
		public ?LabelSort $label = null,
		public ?SlaStatusSort $slaStatus = null,
		public ?CreatedAtSort $createdAt = null,
		public ?UpdatedAtSort $updatedAt = null,
		public ?CompletedAtSort $completedAt = null,
		public ?DueDateSort $dueDate = null,
		public ?CycleSort $cycle = null,
		public ?MilestoneSort $milestone = null,
		public ?AssigneeSort $assignee = null,
		public ?ProjectSort $project = null,
		public ?TeamSort $team = null,
		public ?ManualSort $manual = null,
		public ?WorkflowStateSort $workflowState = null
	) {
	}
}
