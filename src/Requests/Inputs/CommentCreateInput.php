<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CommentCreateInput */
class CommentCreateInput
{
	public function __construct(
		public ?string $id = null,
		public ?string $body = null,
		public ?string $bodyData = null,
		public ?string $issueId = null,
		public ?string $projectUpdateId = null,
		public ?string $documentContentId = null,
		public ?string $parentId = null,
		public ?string $createAsUser = null,
		public ?string $displayIconUrl = null,
		public ?DateTimeInterface $createdAt = null,
		public ?bool $doNotSubscribeToIssue = null,
		public ?bool $createOnSyncedSlackThread = null,
		public ?string $quotedText = null
	) {
	}
}
