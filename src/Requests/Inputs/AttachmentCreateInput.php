<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AttachmentCreateInput */
class AttachmentCreateInput
{
	public function __construct(
		public string $title,
		public string $url,
		public string $issueId,
		public ?string $id = null,
		public ?string $subtitle = null,
		public ?string $iconUrl = null,
		public ?string $metadata = null,
		public ?bool $groupBySource = null,
		public ?string $commentBody = null,
		public ?string $commentBodyData = null,
		public ?string $createAsUser = null
	) {
	}
}
