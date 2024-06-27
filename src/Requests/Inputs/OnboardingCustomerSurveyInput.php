<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OnboardingCustomerSurvey */
class OnboardingCustomerSurveyInput
{
	public function __construct(public ?string $companyRole = null, public ?string $companySize = null)
	{
	}
}
