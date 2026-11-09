<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\JiraSyncDirection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectMigrateSyncInput */
class JiraProjectMigrateSyncInput
{
	public function __construct(public JiraSyncDirection $syncDirection)
	{
	}
}
