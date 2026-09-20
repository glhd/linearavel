<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/DocumentCreateInput */
class DocumentCreateInput
{
	public function __construct(
		public string $title,
		public ?string $id = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $contentData = null,
		public ?string $content = null,
		public ?string $projectId = null,
		public ?string $initiativeId = null,
		public ?string $teamId = null,
		public ?string $issueId = null,
		public ?string $releaseId = null,
		public ?string $cycleId = null,
		public ?string $resourceFolderId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $ownerId = null,
		public ?float $sortOrder = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $subscriberIds = null
	) {
	}
}
