<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerNeedCreateFromAttachmentInput */
class CustomerNeedCreateFromAttachmentInput
{
	public function __construct(public string $attachmentId)
	{
	}
}
