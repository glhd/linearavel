<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReactionCreateInput */
class ReactionCreateInput
{
	public function __construct(public string $emoji, public ?string $id = null, public ?string $commentId = null, public ?string $projectUpdateId = null, public ?string $initiativeUpdateId = null, public ?string $issueId = null, public ?string $postId = null, public ?string $pullRequestId = null, public ?string $pullRequestCommentId = null)
	{
	}
}
