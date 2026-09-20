<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SemanticSearchFilters */
class SemanticSearchFiltersInput
{
	public function __construct(public ?IssueFilterInput $issues = null, public ?ProjectFilterInput $projects = null, public ?InitiativeFilterInput $initiatives = null, public ?DocumentFilterInput $documents = null)
	{
	}
}
