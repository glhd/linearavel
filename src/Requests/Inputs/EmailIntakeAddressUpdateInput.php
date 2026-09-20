<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailIntakeAddressUpdateInput */
class EmailIntakeAddressUpdateInput
{
	public function __construct(public ?bool $enabled = null, public ?string $forwardingEmailAddress = null, public ?string $senderName = null, public ?string $teamId = null, public ?string $templateId = null, public ?bool $repliesEnabled = null, public ?bool $useUserNamesInReplies = null, public ?bool $issueCreatedAutoReplyEnabled = null, public ?string $issueCreatedAutoReply = null, public ?bool $issueCompletedAutoReplyEnabled = null, public ?string $issueCompletedAutoReply = null, public ?bool $issueCanceledAutoReplyEnabled = null, public ?string $issueCanceledAutoReply = null, public ?bool $customerRequestsEnabled = null, public ?bool $reopenOnReply = null)
	{
	}
}
