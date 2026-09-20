<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CommentUpdateInput */
class CommentUpdateInput
{
	public function __construct(
		public ?string $body = null,
		public ?string $bodyData = null,
		public ?string $resolvingUserId = null,
		public ?string $resolvingCommentId = null,
		public ?string $quotedText = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $subscriberIds = null,
		public ?bool $doNotSubscribeToIssue = null
	) {
	}
}
