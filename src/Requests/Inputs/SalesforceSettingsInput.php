<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SalesforceSettingsInput */
class SalesforceSettingsInput
{
	public function __construct(public ?bool $sendNoteOnStatusChange = null, public ?bool $sendNoteOnComment = null, public ?bool $automateTicketReopeningOnCompletion = null, public ?bool $automateTicketReopeningOnCancellation = null, public ?bool $automateTicketReopeningOnComment = null, public ?bool $disableCustomerRequestsAutoCreation = null, public ?bool $automateTicketReopeningOnProjectCompletion = null, public ?bool $automateTicketReopeningOnProjectCancellation = null, public ?bool $enableAiIntake = null, public ?string $subdomain = null, public ?string $url = null, public ?string $reopenCaseStatus = null, public ?bool $restrictVisibility = null, public ?string $defaultTeam = null)
	{
	}
}
