<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailUserAccountAuthChallengeInput */
class EmailUserAccountAuthChallengeInput
{
	public function __construct(public string $email, public ?bool $isDesktop = null, public ?string $clientAuthCode = null, public ?string $signupCode = null, public ?string $inviteLink = null)
	{
	}
}
