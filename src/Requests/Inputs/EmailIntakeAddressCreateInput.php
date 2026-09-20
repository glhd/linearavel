<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\EmailIntakeAddressType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailIntakeAddressCreateInput */
class EmailIntakeAddressCreateInput
{
	public function __construct(public ?string $id = null, public ?EmailIntakeAddressType $type = null, public ?string $forwardingEmailAddress = null, public ?string $senderName = null, public ?string $teamId = null, public ?string $templateId = null, public ?bool $repliesEnabled = null, public ?bool $useUserNamesInReplies = null, public ?bool $issueCreatedAutoReplyEnabled = null, public ?string $issueCreatedAutoReply = null, public ?bool $issueCompletedAutoReplyEnabled = null, public ?string $issueCompletedAutoReply = null, public ?bool $issueCanceledAutoReplyEnabled = null, public ?string $issueCanceledAutoReply = null, public ?bool $customerRequestsEnabled = null, public ?bool $reopenOnReply = null)
	{
	}
}
