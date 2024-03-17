<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectTab;

class FavoriteCreateInput
{
	function __construct(
		public ?string $id = null,
		public ?string $folderName = null,
		public ?string $parentId = null,
		public ?string $issueId = null,
		public ?string $facetId = null,
		public ?string $projectId = null,
		public ?ProjectTab $projectTab = null,
		public ?string $projectTeamId = null,
		public ?string $predefinedViewType = null,
		public ?string $predefinedViewTeamId = null,
		public ?string $cycleId = null,
		public ?string $customViewId = null,
		public ?string $documentId = null,
		public ?string $roadmapId = null,
		public ?string $initiativeId = null,
		public ?string $labelId = null,
		public ?string $userId = null,
		public ?float $sortOrder = null
	) {
	}
}
