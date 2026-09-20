<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\TeamRoleType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamSecuritySettingsInput */
class TeamSecuritySettingsInput
{
	public function __construct(public ?TeamRoleType $issueSharing = null, public ?TeamRoleType $labelManagement = null, public ?TeamRoleType $memberManagement = null, public ?TeamRoleType $teamManagement = null, public ?TeamRoleType $templateManagement = null, public ?TeamRoleType $agentSkillsManagement = null, public ?TeamRoleType $automationManagement = null, public ?TeamRoleType $pinnedViewManagement = null)
	{
	}
}
