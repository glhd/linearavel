<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AttachmentUpdateInput */
class AttachmentUpdateInput
{
	public function __construct(public string $title, public ?string $subtitle = null, public ?string $metadata = null, public ?string $iconUrl = null)
	{
	}
}
