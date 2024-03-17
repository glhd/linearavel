<?php

namespace Glhd\Linearavel\Requests\Inputs;

class EmailUserAccountAuthChallengeInput
{
	function __construct(public string $email, public ?bool $isDesktop = null, public ?string $clientAuthCode = null, public ?string $signupCode = null, public ?string $inviteLink = null)
	{
	}
}
