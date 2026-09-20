<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FrequencyResolutionType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdateInput */
class ProjectUpdateInput
{
	public function __construct(
		public ?string $state = null,
		public ?string $statusId = null,
		public ?string $name = null,
		public ?string $description = null,
		public ?string $content = null,
		public ?string $convertedFromIssueId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $icon = null,
		public ?string $color = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIds = null,
		public ?DateTimeInterface $projectUpdateRemindersPausedUntilAt = null,
		public ?float $updateReminderFrequencyInWeeks = null,
		public ?float $updateReminderFrequency = null,
		public ?FrequencyResolutionType $frequencyResolution = null,
		public ?Day $updateRemindersDay = null,
		public ?int $updateRemindersHour = null,
		public ?string $leadId = null,
		public ?string $leadTeamId = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $memberIds = null,
		public ?string $startDate = null,
		public ?DateResolutionType $startDateResolution = null,
		public ?string $targetDate = null,
		public ?DateResolutionType $targetDateResolution = null,
		public ?DateTimeInterface $completedAt = null,
		public ?DateTimeInterface $canceledAt = null,
		public ?bool $slackNewIssue = null,
		public ?bool $slackIssueComments = null,
		public ?bool $slackIssueStatuses = null,
		public ?float $sortOrder = null,
		public ?float $prioritySortOrder = null,
		public ?bool $trashed = null,
		public ?int $priority = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $labelIds = null
	) {
	}
}
