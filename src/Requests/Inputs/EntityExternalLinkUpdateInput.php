<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EntityExternalLinkUpdateInput */
class EntityExternalLinkUpdateInput
{
	public function __construct(public ?string $url = null, public ?string $label = null, public ?float $sortOrder = null, public ?string $resourceFolderId = null)
	{
	}
}
