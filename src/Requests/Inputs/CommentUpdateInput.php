<?php

namespace Glhd\Linearavel\Requests\Inputs;

class CommentUpdateInput
{
	function __construct(
		public ?string $body = null,
		public ?string $bodyData = null,
		public ?string $resolvingUserId = null,
		public ?string $resolvingCommentId = null,
		public ?string $quotedText = null
	) {
	}
}
