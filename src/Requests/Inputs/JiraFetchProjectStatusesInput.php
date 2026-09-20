<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraFetchProjectStatusesInput */
class JiraFetchProjectStatusesInput
{
	public function __construct(public string $integrationId, public string $projectId)
	{
	}
}
