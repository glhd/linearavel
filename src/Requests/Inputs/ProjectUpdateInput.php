<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Illuminate\Support\Collection;

class ProjectUpdateInput
{
	public function __construct(
		public ?string $state = null,
		public ?string $statusId = null,
		public ?string $name = null,
		public ?string $description = null,
		public ?string $convertedFromIssueId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $icon = null,
		public ?string $color = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIds = null,
		public ?CarbonImmutable $projectUpdateRemindersPausedUntilAt = null,
		public ?string $leadId = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $memberIds = null,
		public ?string $startDate = null,
		public ?DateResolutionType $startDateResolution = null,
		public ?string $targetDate = null,
		public ?DateResolutionType $targetDateResolution = null,
		public ?CarbonImmutable $completedAt = null,
		public ?CarbonImmutable $canceledAt = null,
		public ?CarbonImmutable $pausedAt = null,
		public ?bool $slackNewIssue = null,
		public ?bool $slackIssueComments = null,
		public ?bool $slackIssueStatuses = null,
		public ?float $sortOrder = null
	) {
	}
}
