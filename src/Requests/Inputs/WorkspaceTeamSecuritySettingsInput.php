<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\TeamRoleType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WorkspaceTeamSecuritySettingsInput */
class WorkspaceTeamSecuritySettingsInput
{
	public function __construct(public ?TeamRoleType $teamManagement = null, public ?TeamRoleType $memberManagement = null, public ?bool $allMembersCanJoin = null)
	{
	}
}
