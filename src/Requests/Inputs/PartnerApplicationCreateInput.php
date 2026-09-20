<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PartnerApplicationCreateInput */
class PartnerApplicationCreateInput
{
	public function __construct(
		public string $fullName,
		public string $email,
		public string $role,
		public string $organizationName,
		public string $organizationWebsite,
		public string $organizationType,
		public string $region,
		public string $description,
		public bool $consent,
		public ?string $portfolioCompanies = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $investmentStages = null,
		public ?string $companiesPerCohort = null,
		public ?string $cohortsPerYear = null,
		public ?string $networkSize = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $distributionChannels = null,
		public ?string $offersSoftwarePerks = null,
		public ?string $otherPerks = null
	) {
	}
}
