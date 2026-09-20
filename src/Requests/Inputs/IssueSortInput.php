<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueSortInput */
class IssueSortInput
{
	public function __construct(public ?PrioritySortInput $priority = null, public ?EstimateSortInput $estimate = null, public ?TitleSortInput $title = null, public ?LabelSortInput $label = null, public ?LabelGroupSortInput $labelGroup = null, public ?SlaStatusSortInput $slaStatus = null, public ?CreatedAtSortInput $createdAt = null, public ?UpdatedAtSortInput $updatedAt = null, public ?CompletedAtSortInput $completedAt = null, public ?DueDateSortInput $dueDate = null, public ?TimeInStatusSortInput $accumulatedStateUpdatedAt = null, public ?CycleSortInput $cycle = null, public ?MilestoneSortInput $milestone = null, public ?AssigneeSortInput $assignee = null, public ?DelegateSortInput $delegate = null, public ?ProjectSortInput $project = null, public ?TeamSortInput $team = null, public ?ManualSortInput $manual = null, public ?WorkflowStateSortInput $workflowState = null, public ?CustomerSortInput $customer = null, public ?CustomerRevenueSortInput $customerRevenue = null, public ?CustomerCountSortInput $customerCount = null, public ?CustomerImportantCountSortInput $customerImportantCount = null, public ?RootIssueSortInput $rootIssue = null, public ?LinkCountSortInput $linkCount = null, public ?ReleaseSortInput $release = null)
	{
	}
}
