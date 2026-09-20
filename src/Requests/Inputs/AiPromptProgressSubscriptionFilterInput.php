<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AiPromptProgressSubscriptionFilter */
class AiPromptProgressSubscriptionFilterInput
{
	public function __construct(public ?IDComparatorInput $issueId = null, public ?IDComparatorInput $commentId = null, public ?IDComparatorInput $pullRequestCommentId = null, public ?AiPromptTypeComparatorInput $type = null, public ?AiPromptProgressStatusComparatorInput $status = null)
	{
	}
}
