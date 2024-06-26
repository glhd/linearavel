<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OnboardingCustomerSurveyInput
{
	public function __construct(public ?string $companyRole = null, public ?string $companySize = null)
	{
	}
}
