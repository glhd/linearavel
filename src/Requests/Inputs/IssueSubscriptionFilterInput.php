<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueSubscriptionFilter */
class IssueSubscriptionFilterInput
{
	public function __construct(public ?IDComparatorInput $teamId = null, public ?IDComparatorInput $projectId = null, public ?IDComparatorInput $assigneeId = null, public ?IDComparatorInput $stateId = null, public ?IDComparatorInput $parentId = null)
	{
	}
}
