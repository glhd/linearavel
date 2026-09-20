<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Glhd\Linearavel\Data\Enums\InitiativeStatus;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeCreateInput */
class InitiativeCreateInput
{
	public function __construct(
		public string $name,
		public ?string $id = null,
		public ?string $description = null,
		public ?string $ownerId = null,
		public ?string $leadTeamId = null,
		public ?float $sortOrder = null,
		public ?float $prioritySortOrder = null,
		public ?string $color = null,
		public ?string $icon = null,
		public ?InitiativeStatus $status = null,
		public ?string $targetDate = null,
		public ?DateResolutionType $targetDateResolution = null,
		public ?string $content = null,
		public ?int $priority = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $labelIds = null
	) {
	}
}
