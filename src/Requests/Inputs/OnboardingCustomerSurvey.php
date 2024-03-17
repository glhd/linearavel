<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OnboardingCustomerSurvey
{
	public function __construct(public ?string $companyRole = null, public ?string $companySize = null)
	{
	}
}
