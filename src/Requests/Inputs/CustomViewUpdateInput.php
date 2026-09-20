<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomViewUpdateInput */
class CustomViewUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $icon = null, public ?string $color = null, public ?string $teamId = null, public ?string $projectId = null, public ?string $initiativeId = null, public ?string $ownerId = null, public ?string $filters = null, public ?IssueFilterInput $filterData = null, public ?ProjectFilterInput $projectFilterData = null, public ?InitiativeFilterInput $initiativeFilterData = null, public ?FeedItemFilterInput $feedItemFilterData = null, public ?bool $shared = null)
	{
	}
}
