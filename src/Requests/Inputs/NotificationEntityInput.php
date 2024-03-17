<?php

namespace Glhd\Linearavel\Requests\Inputs;

class NotificationEntityInput
{
	public function __construct(public ?string $issueId = null, public ?string $projectId = null, public ?string $projectUpdateId = null, public ?string $oauthClientApprovalId = null)
	{
	}
}
