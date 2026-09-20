<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FrequencyResolutionType;
use Glhd\Linearavel\Data\Enums\InitiativeStatus;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeUpdateInput */
class InitiativeUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $ownerId = null,
		public ?string $leadTeamId = null,
		public ?float $sortOrder = null,
		public ?float $prioritySortOrder = null,
		public ?string $color = null,
		public ?string $icon = null,
		public ?string $targetDate = null,
		public ?InitiativeStatus $status = null,
		public ?DateResolutionType $targetDateResolution = null,
		public ?bool $trashed = null,
		public ?string $content = null,
		public ?float $updateReminderFrequencyInWeeks = null,
		public ?float $updateReminderFrequency = null,
		public ?FrequencyResolutionType $frequencyResolution = null,
		public ?Day $updateRemindersDay = null,
		public ?int $updateRemindersHour = null,
		public ?int $priority = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $labelIds = null,
		public ?string $customIdentifier = null
	) {
	}
}
