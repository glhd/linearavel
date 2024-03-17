<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\ProjectUpdateReminderFrequency;
use Glhd\Linearavel\Data\Enums\SLADayCountType;
use Illuminate\Support\Collection;

class OrganizationUpdateInput
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $allowedAuthServices,
		public ?string $name = null,
		public ?string $logoUrl = null,
		public ?string $urlKey = null,
		public ?string $gitBranchFormat = null,
		public ?bool $gitLinkbackMessagesEnabled = null,
		public ?bool $gitPublicLinkbackMessagesEnabled = null,
		public ?bool $roadmapEnabled = null,
		public ?ProjectUpdateReminderFrequency $projectUpdatesReminderFrequency = null,
		public ?Day $projectUpdateRemindersDay = null,
		public ?float $projectUpdateRemindersHour = null,
		public ?float $fiscalYearStartMonth = null,
		public ?bool $reducedPersonalInformation = null,
		public ?bool $oauthAppReview = null,
		public ?string $linearPreviewFlags = null,
		public ?bool $slaEnabled = null,
		public ?SLADayCountType $slaDayCount = null,
		public ?bool $allowMembersToInvite = null
	) {
	}
}
