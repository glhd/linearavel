<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationEntityInput */
class NotificationEntityInput
{
	public function __construct(public ?string $issueId = null, public ?string $projectId = null, public ?string $projectUpdateId = null, public ?string $oauthClientApprovalId = null)
	{
	}
}
