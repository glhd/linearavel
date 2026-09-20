<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationEntityInput */
class NotificationEntityInput
{
	public function __construct(public ?string $issueId = null, public ?string $projectId = null, public ?string $initiativeId = null, public ?string $projectUpdateId = null, public ?string $initiativeUpdateId = null, public ?string $oauthClientApprovalId = null, public ?string $id = null)
	{
	}
}
