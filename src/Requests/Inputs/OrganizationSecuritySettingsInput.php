<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UserRoleType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationSecuritySettingsInput */
class OrganizationSecuritySettingsInput
{
	public function __construct(public ?UserRoleType $adminManagementRole = null, public ?UserRoleType $personalApiKeysRole = null, public ?UserRoleType $invitationsRole = null, public ?UserRoleType $teamCreationRole = null, public ?UserRoleType $workspaceInitiativesRole = null, public ?UserRoleType $labelManagementRole = null, public ?UserRoleType $apiSettingsRole = null, public ?UserRoleType $templateManagementRole = null, public ?UserRoleType $automationManagementRole = null, public ?UserRoleType $importRole = null, public ?UserRoleType $agentGuidanceRole = null, public ?UserRoleType $integrationCreationRole = null, public ?UserRoleType $pinnedViewManagementRole = null)
	{
	}
}
