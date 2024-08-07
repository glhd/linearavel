<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ViewPreferencesType;
use Glhd\Linearavel\Data\Enums\ViewType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ViewPreferencesCreateInput */
class ViewPreferencesCreateInput
{
	public function __construct(
		public ViewPreferencesType $type,
		public ViewType $viewType,
		public string $preferences,
		public ?string $id = null,
		public ?string $insights = null,
		public ?string $teamId = null,
		public ?string $projectId = null,
		public ?string $roadmapId = null,
		public ?string $initiativeId = null,
		public ?string $labelId = null,
		public ?string $cycleId = null,
		public ?string $customViewId = null,
		public ?string $userId = null
	) {
	}
}
