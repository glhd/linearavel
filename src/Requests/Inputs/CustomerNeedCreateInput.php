<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerNeedCreateInput */
class CustomerNeedCreateInput
{
	public function __construct(public ?string $id = null, public ?string $customerId = null, public ?string $customerExternalId = null, public ?string $issueId = null, public ?string $projectId = null, public ?string $commentId = null, public ?string $attachmentId = null, public ?float $priority = null, public ?string $body = null, public ?string $bodyData = null, public ?string $attachmentUrl = null, public ?string $createAsUser = null, public ?string $displayIconUrl = null, public ?DateTimeInterface $createdAt = null)
	{
	}
}
