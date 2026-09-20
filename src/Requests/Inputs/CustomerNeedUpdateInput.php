<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerNeedUpdateInput */
class CustomerNeedUpdateInput
{
	public function __construct(public ?string $id = null, public ?string $customerId = null, public ?string $customerExternalId = null, public ?string $issueId = null, public ?string $projectId = null, public ?float $priority = null, public ?bool $applyPriorityToRelatedNeeds = null, public ?string $body = null, public ?string $bodyData = null, public ?string $attachmentUrl = null)
	{
	}
}
